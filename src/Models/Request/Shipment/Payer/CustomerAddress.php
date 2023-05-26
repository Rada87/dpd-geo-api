<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Payer;


use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Shipment\Payer\CustomerAddress\Info;
use Rada87\DpdGeoApi\Models\Request\Shipment\Payer\CustomerAddress\Address as AddressDetails;

class CustomerAddress extends AModelRequest
{
    /**
     * @var AddressDetails
     */
    public $address;

    /**
     * @var int
     */
    public $it4emId;

    /**
     * @var Info
     */
    public $info;

    /**
     * @var bool
     */
    public $isActive;


}
