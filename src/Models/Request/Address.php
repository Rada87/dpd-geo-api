<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Address\Info;

class Address extends AModelRequest
{
    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Address\Address
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
