<?php

namespace Rada87\DpdGeoApi;

use DateTime;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Request\Customer\Customer;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;
use Rada87\DpdGeoApi\Models\Request\Services;
use Rada87\DpdGeoApi\Models\Request\Subject;
use Rada87\DpdGeoApi\Models\Response\Parcel;
use Rada87\DpdGeoApi\Models\Response\UserAccount;

class Client {
    private $connection;

    public function __construct($apiKey, $mode = Modes::PRODUCTION) {
       $this->connection = new Connection($apiKey, $mode);
    }

    /**
     * @return Models\Response\Customer
     */
    public function getCustomer() {
        $customers = $this->getCustomers();
        return reset($customers['customers']);
    }

    /**
     * @return array{Models\Response\UserAccount, Models\Response\Customer[]}
     */
    public function getCustomers() {
        $result = [];
        $response = $this->connection->getCustomers();

        $userAccount = new UserAccount($response['userAccount']);

        $customers = [];
        foreach ($response['customers'] as $item) {
            $customers[] = new Models\Response\Customer($item);
        }

        return [
            'userAccount' => $userAccount,
            'customers' => $customers
        ];
    }

    public function getCustomerAddresses(Customer $customer) {
        $result = [];
        $response = $this->connection->getCustomerAddresses($customer->DSW);

        $address = new Address($response);
        return $address;
    }

    public function getTrackingInfoForMultipleParcels($parcelNumbers) {

    }

    public function getTrackingInfoForParcel($parcelNo) {

    }

    public function getAllParcels(\DateTime $from, \DateTime $to) {
        $result = [];
        $response = $this->connection->getAllParcels($from, $to);
        return $response;
    }

    public function printLabelsForMultipleParcels($parcels) {

    }

    public function printLabelForParcel($parcelIdent) {

    }

    /**
     * @param Models\Request\Customer\Customer $customer
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
     * @return void
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
        $this->connection->createShipment($customer, $deliveryOptions, $shipmentType, $sender, $receiver, $payer, $id, $references, $declaredSender, $services, $parcels);
    }

    public function updateParcel($parcelIdent, $parcelData) {

    }


}
