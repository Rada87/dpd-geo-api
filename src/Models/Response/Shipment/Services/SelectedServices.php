<?php
namespace Rada87\DpdGeoApi\Models\Response\Shipment;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\Services\SelectedServices\CashOnDelivery;
use Rada87\DpdGeoApi\Models\Response\Shipment\Services\SelectedServices\DepartmentDelivery;
use Rada87\DpdGeoApi\Models\Response\Shipment\Services\SelectedServices\PersonalIdentification;

class SelectedServices extends AModelResponse {
    /**
     * @var bool
     */
    public $notification;

    /**
     * @var bool
     */
    public $airExpress;

    /**
     * @var string
     */
    public $dpdTimeGuarantee;

    /**
     * @var bool
     */
    public $dpdGuarantee;

    /**
     * @var bool
     */
    public $swap;

    /**
     * @var bool
     */
    public $dpdPneu;

    /**
     * @var CashOnDelivery
     */
    public $cashOnDelivery;

    /**
     * @var string
     */
    public $pickupPoint;

    /**
     * @var DepartmentDelivery
     */
    public $departmentDelivery;

    /**
     * @var PersonalIdentification
     */
    public $personalIdentification;

    /**
     * @var bool
     */
    public $dpdReturn;

    /**
     * @var bool
     */
    public $shopToShop;

    /**
     * @var bool
     */
    public $shopToHome;

    /**
     * @var bool
     */
    public $ddtl;
}