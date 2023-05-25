<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Payer extends AModelRequest
{
    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var string
     */
    public $customerAddress;
}
