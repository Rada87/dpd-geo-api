<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\Receiver\Address;
use Rada87\DpdGeoApi\Models\Response\Shipment\Receiver\Info;

class Receiver extends AModelResponse {
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
