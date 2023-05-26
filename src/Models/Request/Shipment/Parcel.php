<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment;


use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel\AdditionalServices;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel\Insurance;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel\ParcelNumbers;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel\References;

class Parcel extends AModelRequest {
    /**
     * @var ParcelNumbers
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
     * @var References
     */
    public $references;

    /**
     * @var Insurance
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
