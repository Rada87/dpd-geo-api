<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Customer\Address\Info;

class Subject extends AModelRequest
{
    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Address\Address;
     */
    public $address;

    /**
     * @var \Rada87\DpdGeoApi\Models\Request\Address\Info;
     */
    public $info;
}
