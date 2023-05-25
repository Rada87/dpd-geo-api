<?php

namespace Rada87\DpdGeoApi\Models\Request\Payer;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Address\Address;
use Rada87\DpdGeoApi\Models\Request\Address\Info;

class CustomerAddress extends AModelRequest {
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
