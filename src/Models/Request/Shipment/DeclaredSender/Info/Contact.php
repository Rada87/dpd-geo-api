<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender\Info;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Contact extends AModelRequest
{
    /**
     * @var string
     */
    public $person;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;
}
