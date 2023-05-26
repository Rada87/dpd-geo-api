<?php

namespace Rada87\DpdGeoApi\Models\Response\Me\Customer\Address\Info;

use Rada87\DpdGeoApi\Models\AModelResponse;

class Contact extends AModelResponse
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
