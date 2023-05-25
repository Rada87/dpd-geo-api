<?php

namespace Rada87\DpdGeoApi\Models;

class Parcel {
    /**
     * @var Parcel\ParcelNumbers
     */
    public $parcelNumbers;

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
}
