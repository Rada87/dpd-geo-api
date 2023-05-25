<?php

namespace Rada87\DpdGeoApi\Models\Customer;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Customer\Address\Info;

class DeclaredSender extends AModelRequest
{
    /**
     * @var \Rada87\DpdGeoApi\Models\Response\Customer\Address\Address
     */
    public $address;

    /**
     * @var \Rada87\DpdGeoApi\Models\Response\Customer\Address\Info
     */
    public $info;
}
