<?php
namespace Rada87\DpdGeoApi\Models\Response;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Me\Customer;
use Rada87\DpdGeoApi\Models\Response\Me\UserAccount;

class Me extends AModelResponse
{
    /**
     * @var UserAccount
     */
    public $userAccount;

    /**
     * @var Customer[]
     */
    public $customers;



    public function __construct($data)
    {
        parent::__construct($data);
        if (!empty($data['customers'])) {
            $this->customers = [];
            foreach ($data['customers'] as $value) {
                $this->customers[] = new Customer($value);
            }
        }
    }


    public function getAddress($index = 0) {
        return $this->addresses[$index] ?? new Address();
    }
}