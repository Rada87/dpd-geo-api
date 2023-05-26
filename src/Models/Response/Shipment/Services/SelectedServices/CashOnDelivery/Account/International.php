<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment\Services\SelectedServices\CashOnDelivery\Account;

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
