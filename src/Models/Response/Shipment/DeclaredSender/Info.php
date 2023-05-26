<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\DeclaredSender\Info\Contact;

class Info extends AModelResponse
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
