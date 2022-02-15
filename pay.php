<?php

require 'vendor/autoload.php';

$stripe = new Stripe\StripeClient('sk_test_51JZah9Gk6raBaGt9FcV5nD7fKBQ08LzI3r4Y6f83MdbZnVLugS0imZxACI4L3EoM2QB3NuP4o5QefR0UHci0n0mf00IPFAN6tS');
$session = $stripe->checkout->sessions->create([
    'success_url' => 'https://localhost/payments/success',
    'cancel_url' => 'https://localhost/payments/cancel',
    'payment_method_types' => ['card'],
    'mode' => 'payment',
    'line_items' => [
      "price_data" => [

      ],
    ]
]);




// \Stripe\Stripe::setApiKey('sk_test_51JZah9Gk6raBaGt9FcV5nD7fKBQ08LzI3r4Y6f83MdbZnVLugS0imZxACI4L3EoM2QB3NuP4o5QefR0UHci0n0mf00IPFAN6tS');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost';

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => 'T-shirt',
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
  ]);

header("HTTP/1.1 303 See Other");
header("Location: " . $session->url);