<?php
namespace Rada87\DpdGeoApi\Models\Response;


use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender;
use Rada87\DpdGeoApi\Models\Response\Shipment\Receiver;
use Rada87\DpdGeoApi\Models\Response\Shipment\Sender;
use Rada87\DpdGeoApi\Models\Response\Shipment\Customer;
use Rada87\DpdGeoApi\Models\Response\Shipment\Services;
use Rada87\DpdGeoApi\Models\Response\Shipment\Source;
use Rada87\DpdGeoApi\Models\Response\Shipment\Payer;

class Shipment extends AModelResponse
{
    /**
     * @var string
     */
    public $shipmentType;

    /**
     * @var Customer
     */
    public $customer;

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
     * @var Parcel[]|null
     */
    public $parcels;

    /**
     * @var Source
     */
    public $source;

    public function __construct($data)
    {
        parent::__construct($data);

        if (!empty($data['parcels'])) {
            $this->parcels = [];
            foreach ($data['parcels'] as $parcel) {
                $this->parcels[] = new Shipment\Parcel($parcel);
            }
        }

    }
}
