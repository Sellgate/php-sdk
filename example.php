<?php

require_once __DIR__ . "/src/sellgate.php";

// Example usage
$sellgate = new Sellgate();

// Checkout example
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

// Address example
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