<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Payer extends AModelRequest {
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
