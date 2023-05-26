<?php
namespace Rada87\DpdGeoApi\Models\Response;


use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Customer\Address;

class Customer extends AModelResponse
{
    /**
     * @var Customer\Customer
     */
    public $customer;

    /**
     * @var Address
     */
    public $addresses = [];


    public function __construct($data)
    {
        $this->customer = new Customer\Customer($data['customer']);
        foreach ($data['addresses'] as $address) {
            $this->addresses[] = new Address($address);
        }
    }


    public function getAddress($index = 0) {
        return $this->addresses[$index] ?? new Address();
    }
}