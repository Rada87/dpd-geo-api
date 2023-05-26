<?php
namespace Rada87\DpdGeoApi\Models\Response\Me;


use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Me\Customer\Address;
use Rada87\DpdGeoApi\Models\Response\Me\Customer\Customer as CustomerDetails;

class Customer extends AModelResponse
{
    /**
     * @var CustomerDetails
     */
    public $customer;

    /**
     * @var Address[]
     */
    public $addresses;


    public function __construct($data)
    {
        $this->customer = new Customer\Customer($data['customer']);

        if (!empty($data['addresses'])) {
            $this->addresses = [];
            foreach ($data['addresses'] as $address) {
                $this->addresses[] = new Address($address);
            }
        }
    }


    public function getAddress($index = 0) {
        return $this->addresses[$index] ?? new Address();
    }
}