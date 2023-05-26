<?php
namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Response\Parcel;

class Shipment extends AModelRequest
{
    /**
     * @var string
     */
    public $shipmentType;

    /**
     * @var \Rada87\DpdGeoApi\Models\Response\Customer\Customer
     */
    public $customer;

    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Subject
     */
    public $sender;

    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Subject
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
     * @var \Rada87\DpdGeoApi\Models\Request\Subject
     */
    public $declaredSender;

    /**
     * @var Services
     */
    public $services;

    /**
     * @var array|Parcel[]
     */
    public $parcels;

    /**
     * @var Source
     */
    public $source;
}
