<?php

namespace Rada87\DpdGeoApi\Models\Request;

use CSCZ\DpdApi\Exceptions\DpdGeneralException;
use Rada87\DpdGeoApi\Exceptions\DpdApiGeneralException;
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

    public function getServiceCombination() {
        $result = [];

        if (isset($this->notification)) {
            $result[] = 'D-B2C';
        }

        if (isset($this->cashOnDelivery)) {
            $result[] = 'COD';
        }

        if (isset($this->pickupPoint)) {
            $result[] = 'PSD';
        }

        return implode('-', $result);
    }

    public function getServiceCode() {
        $serviceCombination = $this->getServiceCombination();
        switch ($serviceCombination) {
            case 'D-B2C': return 327;
            case 'D-B2C-COD': return 329;
            case 'D-B2C-PSD': return 337;
            case 'D-B2C-COD-PSD': return 341;
            default: throw new DpdApiGeneralException('Implement others combinations your self');
        }
    }
}