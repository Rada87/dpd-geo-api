<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment;

use Rada87\DpdGeoApi\Models\AModel;
use Rada87\DpdGeoApi\Models\Request\Shipment\Services\SelectedServices;

class Services extends AModel
{
    /**
     * @var SelectedServices
     */
    public $selectedServices;

    /**
     * @var string
     */
    public $serviceCode;

    /**
     * @var string
     */
    public $serviceCombination;
}