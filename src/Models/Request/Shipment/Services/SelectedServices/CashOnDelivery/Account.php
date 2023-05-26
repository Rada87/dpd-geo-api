<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Services\SelectedServices\CashOnDelivery;

use Rada87\DpdGeoApi\Models\AModel;
use Rada87\DpdGeoApi\Models\Services\CashOnDelivery\International;

class Account extends AModel
{
    /**
     * @var string
     */
    public $bankCode;

    /**
     * @var string
     */
    public $bankName;

    /**
     * @var string
     */
    public $accountNumber;

    /**
     * @var string
     */
    public $accountName;

    /**
     * @var International
     */
    public $international;
}
