<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender\Address;
use Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender\Info;

class DeclaredSender extends AModelRequest {
    /**
     * @var Address
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
