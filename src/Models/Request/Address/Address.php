<?php

namespace Rada87\DpdGeoApi\Models\Request\Address;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Address\Address\Country;


class Address extends AModelRequest
{
    /**
     * @var string
     */
    public $city;

    /**
     * @var Country
     */
    public $country;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $street;

}
