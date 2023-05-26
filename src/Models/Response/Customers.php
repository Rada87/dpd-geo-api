<?php
namespace Rada87\DpdGeoApi\Models\Response;

use Rada87\DpdGeoApi\Models\AModelResponse;
use Rada87\DpdGeoApi\Models\Response\Customer;
use Rada87\DpdGeoApi\Models\Response\Customer\UserAccount;

class Customers extends AModelResponse
{
    /**
     * @var Customer[]
     */
   public $customers;

    /**
     * @var UserAccount
     */
   public $userAccount;

    public function __construct($data)
    {
        if (!empty($data['customers'])) {
            foreach ($data['customers'] as $item) {
                $this->customers[] = new Customer($item);
            }
        }

        if (!empty($data['userAccount'])) {
           $this->userAccount = new UserAccount($data['userAccount']);
        }

    }
}