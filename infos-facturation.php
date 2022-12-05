<?php
include "db.php";
require 'vendor/autoload.php';
// Redirect to the URL for the session
//   header("HTTP/1.1 303 See Other");
//   header("Location: " . $session->url);
\Stripe\Stripe::setApiKey('sk_test_51JD4U0B3Y0RxQBUkMfE7UVtPOHigAKePt4OLdKvduD63xmypeCrL7kURjDVvnzcqqBy4tNIAVUHHKp2GzIo099E100nx8ALuhK');

$clientStripe = file_get_contents('entreprise/gestion-payement.json');
$clientStripe = json_decode($clientStripe);

// Authenticate your user.
$session = \Stripe\BillingPortal\Session::create([
    'customer' => $clientStripe->clientStripe,
    'return_url' => 'https://erdeve.fr/entreprise/dashboard.php',
]);

// Redirect to the customer portal.
header("Location: " . $session->url);
exit();