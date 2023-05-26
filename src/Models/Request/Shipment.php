<?php
namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Shipment\Customer;
use Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender;
use Rada87\DpdGeoApi\Models\Request\Shipment\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel;
use Rada87\DpdGeoApi\Models\Request\Shipment\Receiver;
use Rada87\DpdGeoApi\Models\Request\Shipment\Sender;
use Rada87\DpdGeoApi\Models\Request\Shipment\Payer;
use Rada87\DpdGeoApi\Models\Request\Shipment\Services;
use Rada87\DpdGeoApi\Models\Request\Shipment\Source;

class Shipment extends AModelRequest
{
    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var DeliveryOptions
     */
    public $deliveryOptions;

    /**
     * @var string
     */
    public $shipmentType;

    /**
     * @var Sender
     */
    public $sender;

    /**
     * @var Receiver
     */
    public $receiver;

    /**
     * @var Payer
     */
    public $payer;

    /**
     * @var int
     */
    public $id;

    /**
     * @var References
     */
    public $references;

    /**
     * @var DeclaredSender
     */
    public $declaredSender;

    /**
     * @var Services
     */
    public $services;

    /**
     * @var Parcel[]
     */
    public $parcels;

    /**
     * @var Source
     */
    public $source;

    public function addParcel(Parcel $parcel) {
        $this->parcels[] = $parcel;
    }
}
