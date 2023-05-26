<?php
namespace Rada87\DpdGeoApi\Models\Response\Me\Customer;

use Rada87\DpdGeoApi\Models\AModelResponse;

class Customer extends AModelResponse
{
    /**
     * @var string
     */
    public $DSW;

    /**
     * @var bool
     */
    public $isActive;

    /**
     * @var int
     */
    public $id;
}