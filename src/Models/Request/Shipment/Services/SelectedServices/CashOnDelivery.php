<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\Services\SelectedServices;

class CashOnDelivery  {
    /**
     * @var int
     */
    public $amountCents;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $payment;

    /**
     * @var Account
     */
    public $account;

    /**
     * @var string
     */
    public $variableSymbol;
}
