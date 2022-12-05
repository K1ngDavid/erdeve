<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51JD4U0B3Y0RxQBUkMfE7UVtPOHigAKePt4OLdKvduD63xmypeCrL7kURjDVvnzcqqBy4tNIAVUHHKp2GzIo099E100nx8ALuhK');

header('Content-Type: application/json');

$data = file_get_contents('login/forfait.json');
$data = json_decode($data);

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    # TODO: replace this with the `price` of the product you want to sell
    'price' => $data ->forfait,
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => $YOUR_DOMAIN . '/entreprise/dashboard.php?account_create&statut=activate',
  'cancel_url' => $YOUR_DOMAIN . '/login/inscription.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);