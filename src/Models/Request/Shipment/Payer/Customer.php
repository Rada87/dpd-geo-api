<?php
namespace Rada87\DpdGeoApi\Models\Request\Shipment\Payer;

use Rada87\DpdGeoApi\Models\AModelRequest;

/**
 * Customer DSW, isActive, ID
 */
class Customer extends AModelRequest
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