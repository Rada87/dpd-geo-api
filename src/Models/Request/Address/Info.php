<?php

namespace Rada87\DpdGeoApi\Models\Request\Address;

use Rada87\DpdGeoApi\Models\AModelRequest;
use Rada87\DpdGeoApi\Models\Request\Address\Info\Contact;

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
