<?php

namespace Rada87\DpdGeoApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;

class Connection {
    private $apiKey;
    private $client;

    public function __construct($apiKey, $mode) {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $this->getEndpointUrl($mode),
            'timeout'  => 2.0,
            'verify'  => false // SSL verification
        ]);
    }

    public function getCustomers() {
        return $this->sendRequest('GET', '/v1/me');
    }

    public function getTrackingInfoForMultipleParcels($parcelNumbers) {
        return $this->sendRequest('POST', '/v1/parcels/tracking', $parcelNumbers);
    }

    public function getTrackingInfoForParcel($parcelNo) {
        return $this->sendRequest('GET', "/v1/parcels/$parcelNo/tracking");
    }

    public function getAllParcels() {
        return $this->sendRequest('GET', '/v1/parcels');
    }

    public function printLabelsForMultipleParcels($parcels) {
        return $this->sendRequest('POST', '/v1/parcels/labels', $parcels);
    }

    public function printLabelForParcel($parcelIdent) {
        return $this->sendRequest('POST', "/v1/parcels/$parcelIdent/labels");
    }

    public function createParcel($parcelData) {
        return $this->sendRequest('POST', '/v1/parcels', $parcelData);
    }

    public function updateParcel($parcelIdent, $parcelData) {
        return $this->sendRequest('PUT', "/v1/parcels/$parcelIdent", $parcelData);
    }

    public function deleteParcel($parcelIdent) {
        return $this->sendRequest('DELETE', "/v1/parcels/$parcelIdent");
    }

    private function sendRequest($method, $endpoint, $data = []) {
        try {
            $options = ['headers' => ['x-api-key' => $this->apiKey]];
            if ($method === 'POST') {
                $options['json'] = $data;
            }
            $response = $this->client->request($method, $endpoint, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                throw new DpdApiGeneralException('API Request Failed: ' . $e->getResponse()->getReasonPhrase());
            } else {
                throw new DpdApiGeneralException('API Request Failed: ' . $e->getMessage());
            }
        }
    }

    private function getEndpointUrl($mode)
    {
        if ($mode == Modes::PRODUCTION) {
            return 'https://geoapi.dpd.cz';
        } else {
            return 'https://geoapi-test.dpd.cz';
        }
    }
}
