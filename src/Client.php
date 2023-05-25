<?php

namespace Rada87\DpdGeoApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Customer;

class Client {
    private $connection;

    public function __construct($apiKey, $mode = Modes::PRODUCTION) {
       $this->connection = new Connection($apiKey, $mode);
    }

    public function getCustomers() {
        $result = [];
        $response = $this->connection->getCustomers();
        foreach ($response['customers'] as $item) {
            $customer = new Customer($item);
        }
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


}
