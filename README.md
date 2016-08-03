# usps-php
An Object-Oriented And Well Documented PHP Wrapper For The USPS API
Based on https://www.usps.com/business/web-tools-apis/address-information-api.htm

## Features

* An object-oriented PHP wrapper for the USPS API
* Your USPS USER_ID and selection of environment (production or development) is the only required values
* Properly documented, PHP doc blocks, and simple to use
* Full suite of PHP unit tests

## Active API Integrations
* Address validation
* City and state look up with zip code
* Zip code look up with street address, city, and state

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

//  Make the request
$response               = $addressApi->validateAddress($addressValidateRequest);
```

## Installation

```
composer require jamesvweston/usps-php
```

## Configuration

The following variables are required by the USPSClient

* **USPS_USER_ID**      - User id provided by the USPS
* **USPS_ENVIRONMENT**  - production or development

## Example USPSClient Instantiation With .env File

```php
use jamesvweston\USPS\USPSClient;

//  Instantiate the client with the path that the .env is located
$uspsClient             = new USPSClient('./');
```

## Example USPSClient Instantiation With Array

```php
use jamesvweston\USPS\USPSClient;

//  Build the array
$config = [
    'USPS_USER_ID'      => 'xxxxx',
    'USPS_ENVIRONMENT'  => 'production',
];

//  Instantiate the USPSClient with the $config array
$uspsClient             = new USPSClient($config);
```

## Unit Testing
From the command line run the following

```
vendor/bin/phpunit -c phpunit.xml
```