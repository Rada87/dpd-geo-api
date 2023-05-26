<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Parcel;

use Rada87\DpdGeoApi\Models\AModelRequest;

class ParcelNumbers extends AModelRequest {
    /**
     * @var string
     */
    public $main;

    /**
     * @var string
     */
    public $back;
}
