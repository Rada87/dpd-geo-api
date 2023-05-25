<?php

namespace Rada87\DpdGeoApi\Models\Request;

use Rada87\DpdGeoApi\Models\AModel;
use Rada87\DpdGeoApi\Models\Request\Services\CashOnDelivery;
use Rada87\DpdGeoApi\Models\Request\Services\DepartmentDelivery;
use Rada87\DpdGeoApi\Models\Request\Services\PersonalIdentification;

class Services extends AModel
{
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
