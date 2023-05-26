<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment;

use Rada87\DpdGeoApi\Models\AModelResponse;

class Services extends AModelResponse
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