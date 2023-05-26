<?php
namespace Rada87\DpdGeoApi\Models\Response\Me\Customer;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Me\Address\Info;
use Rada87\DpdGeoApi\Models\Response\Me\Customer\Address\Address as AddressDetail;

class Address extends AModelResponse
{
    /**
     * @var AddressDetail
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