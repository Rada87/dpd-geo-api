<?php

namespace Rada87\DpdGeoApi;

use DateTime;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Customer;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;

class Client {
    private $connection;

    public function __construct($apiKey, $mode = Modes::PRODUCTION) {
       $this->connection = new Connection($apiKey, $mode);
    }

    public function getCustomers() {
        $result = [];
        $response = $this->connection->getCustomers();

        $userAccount = new UserAccount($response['userAccount']);

        $customers = [];
        foreach ($response['customers'] as $item) {
            $customers = new Customer($item);
        }

        return [
            'userAccount' => $userAccount,
            'customers' => $customers
        ];
    }

    public function getTrackingInfoForMultipleParcels($parcelNumbers) {

    }

    public function getTrackingInfoForParcel($parcelNo) {

    }

    public function getAllParcels(DateTime $from, DateTime $to) {
        $result = [];
        $response = $this->connection->getAllParcels($from, $to);
        return $response;
    }

    public function printLabelsForMultipleParcels($parcels) {

    }

    public function printLabelForParcel($parcelIdent) {

    }

    public function createParcel(
        Models\Request\Customer $customer,
        DeliveryOptions $deliveryOptions,
        string $shipmentType,
        string $sender,
        string $receiver,
        Payer $payer,
        References $references,
        Customer\DeclaredSender $declaredSender
    ) {
        $this->connection->createParcel($customer, $deliveryOptions, $shipmentType, $sender, $receiver, $payer, $references, $declaredSender);
    }

    public function updateParcel($parcelIdent, $parcelData) {

    }


}
