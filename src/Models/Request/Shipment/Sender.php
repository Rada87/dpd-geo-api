<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Sender extends AModelRequest {
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
