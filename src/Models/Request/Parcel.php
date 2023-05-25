<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Parcel\AdditionalServices;

class Parcel extends AModelRequest {
    /**
     * @var Parcel\ParcelNumbers
     */
    public $parcelNumbers;

    /**
     * @var string
     */
    public $parcelNumber;

    /**
     * @var string
     */
    public $backParcelNumber;

    /**
     * @var Parcel\References
     */
    public $references;

    /**
     * @var Parcel\Insurance
     */
    public $insurance;

    /**
     * @var bool
     */
    public $isPrinted;

    /**
     * @var int
     */
    public $weightGrams;

    /**
     * @var int
     */
    public $id;

    /**
     * @var AdditionalServices
     */
    public $additionalServices;
}
