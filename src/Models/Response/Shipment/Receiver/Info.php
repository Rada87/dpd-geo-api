<?php

namespace Rada87\DpdGeoApi\Models\Response\Shipment\Receiver;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Shipment\Receiver\Info\Contact;

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
