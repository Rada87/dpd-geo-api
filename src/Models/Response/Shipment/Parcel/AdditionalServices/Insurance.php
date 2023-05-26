<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment\Parcel\AdditionalServices;

use Rada87\DpdGeoApi\Models\AModelResponse;

class Insurance extends AModelResponse  {
    /**
     * @var int
     */
    public $amountCents;

    /**
     * @var string
     */
    public $currency;
}
