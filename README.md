# Sellgate PHP SDK

This is the Sellgate PHP SDK. It is a simple SDK to use the Sellgate API. 

Sellgate provides an API service that allows sellers and developers to easily integrate crypto payments into their applications or payment flows. Using our service has several benefits:

- Low transaction fees, just 1%.
- No authentication required for any usage: No API keys, no accounts.
- Examples for quick implementation on our docs.
- Support for bug fixes, extra features and integration assistance.

For further documentation, please refer to the [Sellgate docs](https://sellgate.io/docs)

## Installation

```bash
composer require sellgate/php-sdk
```	

## Usage

```php
<?php

require_once __DIR__ . "vendor/autoload.php";

$sellgate = new Sellgate();

$checkoutData = [
    "title" => "Premium Subscription",
    "description" => "1-year access to all premium features",
    "currency" => "USD",
    "price" => "99.99",
    "crypto" => [
        [
            "network" => "ETH",
            "coin" => "ETH",
            "address" => "0xB1DA646D1cD015d205a99198e809724D5C78109d"
        ]
    ],
    "webhook" => "https://example.com/webhook",
    "return" => "https://example.com/thank-you"
];

$checkoutResult = $sellgate->createCheckout($checkoutData);
print_r($checkoutResult);

$addressData = [
    "crypto" => [
        "network" => "ETH",
        "coin" => "ETH",
        "address" => "0xB1DA646D1cD015d205a99198e809724D5C78109d"
    ],
    "webhook" => "https://example.com/webhook"
];

$addressResult = $sellgate->createAddress($addressData);
print_r($addressResult);
```
