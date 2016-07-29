# usps-php
A Basic, Low-Level PHP Wrapper For Caravana's API

## Features

* A simple, object-oriented PHP wrapper for the USPS API
* Your USPS USER_ID is the only required credential
* Properly documented, PHP doc blocks, and simple to use
* Full suite of PHP unit tests

## Example Address Look Up

```php
use jamesvweston\USPS\USPSClient;
use jamesvweston\USPS\Models\Address;
use jamesvweston\USPS\Models\Requests\AddressValidateRequest;

//  Instantiate the client with the path that the .env is located
$uspsClient             = new USPSClient('./');
$addressApi             = $uspsClient->getAddressApi();

//  Construct an address object to validate
$address                = new Address();
$address->setAddress2('111 W Harbor Dr');
$address->setCity('San Diego');
$address->setState('CA');
$address->setZip5('92101');

//  Construct the request
$addressValidateRequest = new AddressValidateRequest();

//  Add the address to the request
$addressValidateRequest->addAddress($address);

$response               = $addressApi->validateAddress($addressValidateRequest);
```

## Installation

```
composer require jamesvweston/usps-php
```

## Configuration

Configure the following environment variables or pass these values as an associative array to the USPSClient

* **USPS_USER_ID**      - User id provided by the USPS
* **USPS_ENVIRONMENT**  - production or development

## Unit Testing
From the command line run the following

```
vendor/bin/phpunit -c phpunit.xml
```