<?php

namespace Rada87\DpdGeoApi;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Customer;
use Rada87\DpdGeoApi\Models\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Parcel\References;
use Rada87\DpdGeoApi\Models\Payer;

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

    public function getAllParcels(DateTime $from, DateTime $to) {
        $url = '/v1/parcels?from=' . urlencode($from->format('Y-m-d')) . '&to=' . urlencode($to->format('Y-m-d'));
        return $this->sendRequest('GET', $url);
    }

    public function printLabelsForMultipleParcels($parcels) {
        return $this->sendRequest('POST', '/v1/parcels/labels', $parcels);
    }

    public function printLabelForParcel($parcelIdent) {
        return $this->sendRequest('POST', "/v1/parcels/$parcelIdent/labels");
    }

    public function createParcel(
        Models\Request\Customer        $customer,
        Models\Request\DeliveryOptions $deliveryOptions,
        string                         $shipmentType,
        string                         $sender,
        string $receiver,
        Models\Request\Payer           $payer,
        Models\Request\References $references,
        Customer\DeclaredSender        $declaredSender
    ) {
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
                throw new DpdApiGeneralException('API Request Failed: ' . $e->getResponse()->getReasonPhrase() . ' ' . $e->getMessage());
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
