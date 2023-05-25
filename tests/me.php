<?php

use Rada87\DpdGeoApi\Client;
use Rada87\DpdGeoApi\Enums\Modes;

include "./config.php";

$api = new Client(DPD_API_KEY, Modes::TEST);
$response = $api->getCustomers();

die(print_r($response, 1));
