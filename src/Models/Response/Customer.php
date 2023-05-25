<?php
namespace Rada87\DpdGeoApi\Models\Response;


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
        $this->customer = new \Rada87\DpdGeoApi\Models\Response\Customer\Customer($data['customer']);
        foreach ($data['addresses'] as $address) {
            $this->addresses[] = new Address($address);
        }
    }


}