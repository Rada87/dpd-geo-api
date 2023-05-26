<?php

namespace Rada87\DpdGeoApi;

use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
use Rada87\DpdGeoApi\Models\Response\Customer\Address;
use Rada87\DpdGeoApi\Models\Response\Customer\Customer;
use Rada87\DpdGeoApi\Models\Response\Customers;
use Rada87\DpdGeoApi\Models\Response\Me;
use Rada87\DpdGeoApi\Models\Response\Shipment as ShipmentResponse;
use Rada87\DpdGeoApi\Models\Request\Shipment as ShipmentRequest;
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
     * /customers
     * @return Customers
     */
    public function getCustomers() {
        $response = $this->connection->sendRequest('GET', '/v1/me');
        return new Customers($response);
    }

    /**
     * /me
     * @return Me
     */
    public function getMeInfo() {
        $response = $this->connection->sendRequest('GET', "/v1/me");
        return new Me($response);
    }

    /**
     * @param Customer $customer
     * @return Address[]
     * @throws DpdApiGeneralException
     */
    public function getCustomerAddresses(Customer $customer) {
        $result = [];

        $url = "/v1/customers/{$customer->DSW}/addresses";
        $response = $this->connection->sendRequest('GET', $url);

        if (!empty($response)) {
            foreach ($response as $item) {
                $result[] = new Address($item);
            }
        }

        return $result;
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @return Parcel[]
     */
    public function getParcels($from, $to) {
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
     * @param ShipmentRequest $shipment
     * @return ShipmentResponse[]
     */
    public function createShipment($shipment) {
        $newShipments = [];

        $data = [
            $shipment
        ];

        $result = $this->connection->sendRequest('POST', '/v1/shipments', $data);
        if (!empty($result)) {
            foreach ($result as $item) {
                $newShipments[] = new ShipmentResponse($item);
            }
        }

        return $newShipments;
    }
}
