<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender\Address;
use Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender\Info;

class DeclaredSender extends AModelResponse {
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
