<?php

namespace Rada87\DpdGeoApi\Models\Request;


use Rada87\DpdGeoApi\Models\Request\Label\PrintProperties;
use Rada87\DpdGeoApi\Models\Request\Shipment\Parcel;

class Label extends AModelRequest
{
    /**
     * @var string / Rada87\DpdGeoApi\Enums\PrintTypes
     */
    public $printType;

    /**
     * @var PrintProperties
     */
    public $printProperties;

    /**
     * @var Parcel[]|null
     */
    public $parcels;

    public function addParcel(Parcel $parcel) {
        $this->parcels[] = $parcel;
    }
}
