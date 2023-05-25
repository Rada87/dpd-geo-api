<?php

use Rada87\DpdGeoApi\Client;
use Rada87\DpdGeoApi\Enums\Completness;
use Rada87\DpdGeoApi\Enums\Modes;
use Rada87\DpdGeoApi\Enums\ShipmentTypes;
use Rada87\DpdGeoApi\Models\Request\Address\Address;
use Rada87\DpdGeoApi\Models\Request\Address\Address\Country;
use Rada87\DpdGeoApi\Models\Request\Address\Info;
use Rada87\DpdGeoApi\Models\Request\Address\Info\Contact;
use Rada87\DpdGeoApi\Models\Request\DeliveryOptions;
use Rada87\DpdGeoApi\Models\Request\Payer;
use Rada87\DpdGeoApi\Models\Request\References;
use Rada87\DpdGeoApi\Models\Request\Services;
use Rada87\DpdGeoApi\Models\Request\Source;
use Rada87\DpdGeoApi\Models\Request\Subject;
use Rada87\DpdGeoApi\Models\Request\Customer\Customer;
use Rada87\DpdGeoApi\Models\Request\Parcel;


include "config.php";

$api = new Client(DPD_API_KEY, Modes::TEST);

$dsw = '53704722159';
$id = 7441;
$order_id = 123456;
$total = 26000;

$deliveryOptions = new DeliveryOptions();
$deliveryOptions->completeness = Completness::COMPLETE_ONLY;

$shipmentType = ShipmentTypes::STANDARD;

// Vytvoření instance třídy Customer
$customer = new Customer();
$customer->DSW = $dsw;
$customer->isActive = true;
$customer->id = $id;

// Vytvoření instance třídy Sender
$sender = new Subject();
$sender->info = new Info();
$sender->info->name1 = "Sender Doe";
$sender->info->contact = new Contact();
$sender->info->contact->person = "Sender Name";
$sender->info->contact->phone = "+420602123123";
$sender->info->contact->email = "info@example.com";
$sender->address = new Address();
$sender->address->street = "Dlouha 123";
$sender->address->postalCode = "10800";
$sender->address->city = "Praha 8";
$sender->address->country = new Country();
$sender->address->country->isoAlpha3 = 'CZE';
//$sender->address->houseNumber = "132";

// Vytvoření instance třídy Receiver
$receiver = new Subject();
$receiver->info = new Info();
$receiver->info->name1 = "Receiver Doe";
$receiver->info->contact = new Contact();
$receiver->info->contact->person = "Receiver Doe";
$receiver->info->contact->phone = "+420602123123";
$receiver->info->contact->email = "info@example.com";
$receiver->address = new Address();
$receiver->address->street = "Example Street 368/23";
$receiver->address->postalCode = "10800";
$receiver->address->city = "Praha 8";
$receiver->address->country = new Country();
$receiver->address->country->isoAlpha3 = 'CZE';

// Vytvoření instance třídy Payer
$payer = new Payer();
$payer->customer = new Customer();
$payer->customer->DSW = $dsw;
$payer->customer->isActive = true;
$payer->customer->id = $id;
$payer->customerAddress = new Payer\CustomerAddress();
$payer->customerAddress->info = new Info();
$payer->customerAddress->info->name1 = "Payer Declared";
$payer->customerAddress->info->contact = new Contact();
$payer->customerAddress->info->contact->person = "Payer Declarede";
$payer->customerAddress->info->contact->phone = "+420602123123";
$payer->customerAddress->info->contact->email = "asdasd@example.com";
$payer->customerAddress->address = new Address();
$payer->customerAddress->address->street = "Example Street 368/23";
$payer->customerAddress->address->postalCode = "10800";
$payer->customerAddress->address->city = "Praha 8";
$payer->customerAddress->address->country = new Country();
$payer->customerAddress->address->country->isoAlpha3 = 'CZE';

// Vytvoření instance třídy References
$references = new References();
$references->ref1 = $order_id;

// Vytvoření instance třídy DeclaredSender
$declaredSender = new Subject();
$declaredSender->info = new Info();
$declaredSender->info->name1 = "Sender Declared";
$declaredSender->info->contact = new Contact();
$declaredSender->info->contact->person = "Sender Declarede";
$declaredSender->info->contact->phone = "+420602123123";
$declaredSender->info->contact->email = "asdasd@example.com";
$declaredSender->address = new Address();
$declaredSender->address->street = "Example Street 368/23";
$declaredSender->address->postalCode = "10800";
$declaredSender->address->city = "Praha 8";
$declaredSender->address->country = new Country();
$declaredSender->address->country->isoAlpha3 = 'CZE';

// Vytvoření instance třídy Services
$services = new Services();
$services->serviceCode = "101";
$services->serviceCombination = "D-B2C-PSD";
$services->selectedServices = new Services();
$services->selectedServices->notification = false;
$services->selectedServices->airExpress = false;
$services->selectedServices->dpdTimeGuarantee = "DPD12";
$services->selectedServices->dpdGuarantee = false;
$services->selectedServices->swap = false;
$services->selectedServices->dpdPneu = false;
/*
$services->selectedServices->cashOnDelivery = new stdClass();
$services->selectedServices->cashOnDelivery->value = "<Error: Too many levels of nesting to fake this schema>";
$services->selectedServices->cashOnDelivery->description = "Cash on delivery - Allows you to specify the amount to be collected from the consignee";
$services->selectedServices->cashOnDelivery->title = "Cash on delivery";
$services->selectedServices->pickupPoint = new stdClass();
$services->selectedServices->pickupPoint->value = "<Error: Too many levels of nesting to fake this schema>";
$services->selectedServices->pickupPoint->description = "You can use this service to order a delivery to a specified pickup point\n\nSet this value to the ID of the pickup point you want the shipment to be delivered to.\n";
$services->selectedServices->pickupPoint->title = "Pickup point delivery";
$services->selectedServices->departmentDelivery = new DepartmentDelivery();
$services->selectedServices->departmentDelivery->building = "Budova A";
$services->selectedServices->departmentDelivery->floor = "Druhé patro";
$services->selectedServices->departmentDelivery->department = "Dopravní oddělení";
$services->selectedServices->personalIdentification = new stdClass();
$services->selectedServices->personalIdentification->value = "<Error: Too many levels of nesting to fake this schema>";
*/

$services->selectedServices->dpdReturn = false;
$services->selectedServices->shopToShop = false;
$services->selectedServices->shopToHome = false;
$services->selectedServices->ddtl = false;

// Vytvoření instance třídy Parcels
$parcels = [];
$parcel1 = new Parcel();
$parcel1->parcelNumber = '13815045502659';
$parcel1->backParcelNumber = $parcel1->parcelNumber;
$parcel1->references = new Parcel\References();
$parcel1->references->ref1 = $order_id;
$parcel1->additionalServices = new Parcel\AdditionalServices();
$parcel1->additionalServices->insurance = new Parcel\Insurance();
$parcel1->additionalServices->insurance->currency = 'CZK';
$parcel1->additionalServices->insurance->amountCents = $total;
$parcel1->weightGrams = 850;
$parcels[] = $parcel1;


// Vytvoření instance třídy Source
$source = new Source();
$source->systemId = "CSCart";




// Volání metody s předanými daty
$api->createShipment(
    $customer,
    $deliveryOptions,
    $shipmentType,
    $sender,
    $receiver,
    $payer,
    $id,
    $references,
    $declaredSender,
    $services,
    $parcels
);
