<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Services\SelectedServices\CashOnDelivery\Account;

use Rada87\DpdGeoApi\Models\AModel;

class International extends AModel
{
    /**
     * @var string
     */
    public $IBAN;

    /**
     * @var string
     */
    public $BIC;
}
