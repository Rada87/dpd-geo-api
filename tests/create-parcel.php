<?php

use Rada87\DpdGeoApi\Client;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Models\Customer\DeclaredSender;
use Rada87\DpdGeoApi\Models\Request\Address\Address;
use Rada87\DpdGeoApi\Models\Request\Address\Address\Country;
use Rada87\DpdGeoApi\Models\Request\Address\Info\Contact;
use Rada87\DpdGeoApi\Models\Request\Customer;
use Rada87\DpdGeoApi\Models\Request\Customer\Address\Info;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;

include "config.php";

$api = new Client(DPD_API_KEY, Modes::TEST);

// Vytvoření instance třídy Customer
$customer = new Customer();
$customer->dsw = "stringstrin";

// Vytvoření instance třídy DeliveryOptions
$deliveryOptions = new DeliveryOptions();
$deliveryOptions->completeness = "CompleteOnly";

$shipmentType = "Standard";
$sender = "string";
$receiver = "string";

// Vytvoření instance třídy Payer
$payer = new Payer();
$payer->customer = new Customer();
$payer->customer->dsw = "stringstrin";
$payer->customerAddress = "string";

// Vytvoření instance třídy References
$references = new References();
$references->ref1 = "string";
$references->ref2 = "string";
$references->ref3 = "string";
$references->ref4 = "string";

// Vytvoření instance třídy Address pro DeclaredSender
$declaredSenderAddress = new Address();
$declaredSenderAddress->street = "Example Street 368/23";
$declaredSenderAddress->postalCode = "40001";
$declaredSenderAddress->city = "Praha 8";
$declaredSenderAddress->houseNumber = "string";
$declaredSenderAddress->country = new Country();
$declaredSenderAddress->country->isoAlpha3 = "str";

// Vytvoření instance třídy Contact pro DeclaredSender
$declaredSenderContact = new Contact();
$declaredSenderContact->person = "John Doe";
$declaredSenderContact->phone = "123 456 789";
$declaredSenderContact->email = "string";

// Vytvoření instance třídy Info pro DeclaredSender
$declaredSenderInfo = new Info();
$declaredSenderInfo->name1 = "John Doe";
$declaredSenderInfo->name2 = "John Doe";
$declaredSenderInfo->contact = $declaredSenderContact;

// Vytvoření instance třídy DeclaredSender
$declaredSender = new DeclaredSender();
$declaredSender->info = $declaredSenderInfo;
$declaredSender->address = $declaredSenderAddress;

// Volání metody createParcel s připravenými vstupními daty
$response = $api->createParcel($customer, $deliveryOptions, $shipmentType, $sender, $receiver, $payer, $references, $declaredSender);
