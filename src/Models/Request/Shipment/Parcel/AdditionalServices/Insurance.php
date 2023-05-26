<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Parcel\AdditionalServices;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Insurance extends AModelRequest  {
    /**
     * @var int
     */
    public $amountCents;

    /**
     * @var string
     */
    public $currency;
}
