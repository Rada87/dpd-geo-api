<?php

namespace Rada87\DpdGeoApi\Models\Response\Customer;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Customer\Address\Info;

class Address extends AModelResponse
{
    /**
     * @var \Rada87\DpdGeoApi\Models\Customer\Address\Address
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
