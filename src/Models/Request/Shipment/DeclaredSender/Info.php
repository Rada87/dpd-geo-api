<?php

namespace Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Shipment\DeclaredSender\Info\Contact;

class Info extends AModelRequest
{
    /**
     * @var Contact
     */
    public $contact;

    /**
     * @var string
     */
    public $name1;

    /**
     * @var string
     */
    public $name2;
}
