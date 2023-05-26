<?php

namespace Rada87\DpdGeoApi;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Request\Customer\Customer;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;
use Rada87\DpdGeoApi\Models\Request\Services;
use Rada87\DpdGeoApi\Models\Request\Subject;
use Rada87\DpdGeoApi\Models\Response\Parcel;

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

    /**
     * @param $mode
     * @return string
     */
    private function getEndpointUrl($mode)
    {
        if ($mode == Modes::PRODUCTION) {
            return 'https://geoapi.dpd.cz';
        } else {
            return 'https://geoapi-test.dpd.cz';
        }
    }


    public function getCustomers() {
        return $this->sendRequest('GET', '/v1/me');
    }

    /**
     * @param string $DSW
     * @return mixed
     * @throws DpdApiGeneralException
     */
    public function getCustomerAddresses(string $DSW)
    {
        $url = "/v1/customers/{$DSW}/addresses";
        return $this->sendRequest('GET', $url);
    }

    /**
     * @param Customer $customer
     * @param DeliveryOptions $deliveryOptions
     * @param string $shipmentType
     * @param Subject $sender
     * @param Subject $receiver
     * @param Payer $payer
     * @param string $id
     * @param References $references
     * @param Subject $declaredSender
     * @param Services $services
     * @param Parcel[] $parcels
     * @return mixed
     * @throws DpdApiGeneralException
     * @throws GuzzleException
     */
    public function createShipment(
        $customer,
        $deliveryOptions,
        $shipmentType,
        $sender,
        $receiver,
        $payer,
        $id,
        $references,
        $declaredSender,
        $services,
        $parcels
    ) {

        $data = [
            [
                "shipmentType" => $shipmentType,
                "customer" => $customer,
                "sender" => $sender,
                "receiver" => $receiver,
                "payer" => $payer,
                "id" => $id,
                "references" => $references,
                "declaredSender" => $declaredSender,
                "services" => $services,
                "parcels" => $parcels
            ]
        ];

        return $this->sendRequest('POST', '/v1/shipments', $data);
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


    /**
     * @param $method
     * @param $endpoint
     * @param $data
     * @return mixed
     * @throws DpdApiGeneralException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    private function sendRequest($method, $endpoint, $data = []) {
        try {
            $options = ['headers' => ['x-api-key' => $this->apiKey]];
            if ($method === 'POST') {
                $data = $this->removeNullValues($data);
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

    private function removeNullValues($data) {
        if (is_array($data)) {
            return array_filter(array_map([$this, 'removeNullValues'], $data), function($value) {
                return !is_null($value);
            });
        } elseif (is_object($data)) {
            foreach ($data as $key => $value) {
                if (is_null($value)) {
                    unset($data->$key);
                } elseif (is_array($value) || is_object($value)) {
                    $data->$key = $this->removeNullValues($value);
                }
            }
            return $data;
        }
        return $data;
    }
}