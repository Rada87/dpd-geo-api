<?php

use Rada87\DpdGeoApi\Client;
use Rada87\DpdGeoApi\Enums\Modes;

include "./config.php";

$api = new Client(DPD_API_KEY, Modes::TEST);
$from = new DateTime('2023-01-25');
$to = new DateTime('2023-05-25');
$response = $api->getParcels($from, $to);

die(print_r($response, 1));
