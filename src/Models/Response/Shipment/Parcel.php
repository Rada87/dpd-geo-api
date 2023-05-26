<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment;


use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\Parcel\AdditionalServices;
use Rada87\DpdGeoApi\Models\Response\Shipment\Parcel\Insurance;
use Rada87\DpdGeoApi\Models\Response\Shipment\Parcel\ParcelNumbers;
use Rada87\DpdGeoApi\Models\Response\Shipment\Parcel\References;

class Parcel extends AModelResponse {
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
