<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Payer\CustomerAddress;

class Payer extends AModelRequest
{
    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Customer\Customer
     */
    public $customer;

    /**
     * @var Address
     */
    public $customerAddress;
}
