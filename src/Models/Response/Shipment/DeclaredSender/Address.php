<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender;


use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender\Address\Country;

class Address extends AModelResponse
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
