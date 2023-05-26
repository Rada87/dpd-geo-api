<?php

namespace Rada87\DpdGeoApi;

use DateTime;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;
use Rada87\DpdGeoApi\Models\Request\Services;
use Rada87\DpdGeoApi\Models\Request\Subject;
use Rada87\DpdGeoApi\Models\Response\Customer\Address;
use Rada87\DpdGeoApi\Models\Response\Customer\Customer;
use Rada87\DpdGeoApi\Models\Response\Customers;
use Rada87\DpdGeoApi\Models\Response\Me;
use Rada87\DpdGeoApi\Models\Response\Me\UserAccount;
use Rada87\DpdGeoApi\Models\Response\Shipment;
use Rada87\DpdGeoApi\Request\CreateShipmentResult;
use Rada87\DpdGeoApi\Models\Response\Shipment\Parcel;

class Client {
    private $connection;

    public function __construct($apiKey, $mode = Modes::PRODUCTION) {
       $this->connection = new Connection($apiKey, $mode);
    }

    /**
     * @return Models\Response\Customer;
     */
    public function getCustomer() {
        $customers = $this->getCustomers();
        return empty($customers->customers[0]) ? new Models\Response\Customer() : $customers->customers[0];
    }


    /**
     * @return Customers
     */
    public function getCustomers() {
        $response = $this->connection->getCustomers();
        return new Customers($response);
    }

    public function getMeInfo() {
        $response = $this->connection->getMeInfo();
        return new Me($response);
    }

    /**
     * @param Customer $customer
     * @return Address[]
     * @throws DpdApiGeneralException
     */
    public function getCustomerAddresses(Customer $customer) {
        $result = [];
        $response = $this->connection->getCustomerAddresses($customer->DSW);

        if (!empty($response)) {
            foreach ($response as $item) {
                $result[] = new Address($item);
            }
        }

        return $result;
    }

    /**
     * @param DateTime $from
     * @param DateTime $to
     * @return Parcel[]
     */
    public function getParcels(\DateTime $from, \DateTime $to) {
        $result = [];
        $response = $this->connection->getParcels($from, $to);
        if (!empty($response)) {
            foreach ($response as $item) {
                $result[] = new Shipment\Parcel($item);
            }
        }

        return $result;
    }

    /**
     * @param Models\Request\Customer $customer
     * @param DeliveryOptions $deliveryOptions
     * @param string $shipmentType
     * @param Models\Request\Address $sender
     * @param Subject $receiver
     * @param Payer $payer
     * @param References $references
     * @param Subject $declaredSender
     * @param Services $services
     * @param Parcel[] $parcels
     * @return Shipment[]
     */
    public function createShipment(
        $customer,
        $deliveryOptions,
        $shipmentType,
        $sender,
        $receiver,
        $payer,
        $references,
        $declaredSender = null,
        $services = null,
        $parcels
    ) {
        $newShipments = [];

        $data = [
            [
                "shipmentType" => $shipmentType,
                "customer" => $customer,
                "sender" => $sender,
                "receiver" => $receiver,
                "payer" => $payer,
                "references" => $references,
                "declaredSender" => $declaredSender,
                "services" => $services,
                "parcels" => $parcels
            ]
        ];
        $result = $this->connection->createShipment($data);
        if (!empty($result)) {
            foreach ($result as $item) {
                $newShipments[] = new Shipment($item);
            }
        }

        return $newShipments;
    }

    public function updateParcel($parcelIdent, $parcelData) {

    }


}
