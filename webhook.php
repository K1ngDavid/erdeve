<?php
include "db.php";
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51JD4U0B3Y0RxQBUkMfE7UVtPOHigAKePt4OLdKvduD63xmypeCrL7kURjDVvnzcqqBy4tNIAVUHHKp2GzIo099E100nx8ALuhK');


$endpoint_secret = 'whsec_rFcZ11cxh9i3uvhelxhQFyxkRRYClgV3';

$payload = @file_get_contents('php://input');
$event = null;

try {
    $event = \Stripe\Event::constructFrom(
        json_decode($payload, true)
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    echo '⚠️  Webhook error while parsing basic request.';
    http_response_code(400);
    exit();
}
if ($endpoint_secret) {
    // Only verify the event if there is an endpoint secret defined
    // Otherwise use the basic decoded event
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        echo '⚠️  Webhook error while validating signature.';
        http_response_code(400);
        exit();
    }
}

// Handle the event
switch ($event->type) {
    case 'checkout.session.completed':
        $paymentIntent = $event->data->object;

        $dataUser = file_get_contents("login/info-client.json");
        $dataUser = json_decode($dataUser);

        $updateUser = $db->prepare("update utilisateur set etat='checkout.session.completed' where id=?");
        $updateUser->execute(array($dataUser->id));



        $tab = array();
        $tab['idEvent'] = $paymentIntent->id;
        $tab['idUser'] = $dataUser->id;
        $tab['statut'] = 'checkout.session.completed';

        file_put_contents('info-payement.json',json_encode($tab));
        break;

    case 'customer.created':
        $paymentIntent = $event->data->object;

        $dataUser = file_get_contents("login/info-client.json");
        $dataUser = json_decode($dataUser);

        $updateUser = $db->prepare("update utilisateur set cuStripe=? where id=?");
        $updateUser->execute(array($paymentIntent->id,$dataUser->id));



        $tab = array();
        $tab['idEvent'] = $paymentIntent->id;
        $tab['idUser'] = $dataUser->id;
        $tab['statut'] = 'customer.created';

        file_put_contents('info-payement.json',json_encode($tab));

        break;
    case 'invoice.paid':
        $paymentIntent = $event->data->object;

        $dataUser = file_get_contents("login/info-client.json");
        $dataUser = json_decode($dataUser);

        $etat='invoice.paid';
        $activation ='activer';

        $updateUser = $db->prepare("update utilisateur set etat=?,activationCompte=?where id=?");
        $updateUser->execute(array($etat,$activation,$dataUser->id));


        $tab = array();
        $tab['idEvent'] = $paymentIntent->id;
        $tab['idUser'] = $dataUser->id;
        $tab['statut'] = 'invoice.paid';

        file_put_contents('info-payement.json',json_encode($tab));
        break;
    case 'invoice.payment_failed':
        $paymentIntent = $event->data->object;


        $updateUser = $db->prepare("update utilisateur set etat='invoice.payment_failed' where cuStripe=?");
        $updateUser->execute(array($paymentIntent->id));


        $tab = array();
        $tab['idEvent'] = $paymentIntent->id;
        $tab['idUser'] = $dataUser->id;
        $tab['statut'] = 'invoice.payment_failed';

        file_put_contents('info-payement.json',json_encode($tab));
        break;

    default:
        // Unexpected event type
        echo 'Received unknown event type';
}

http_response_code(200);