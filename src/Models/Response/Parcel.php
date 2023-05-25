<?php

namespace Rada87\DpdGeoApi\Models\Response;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Parcel\AdditionalServices;

class Parcel extends AModelResponse {
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
