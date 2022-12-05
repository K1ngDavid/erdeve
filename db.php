<?php
try {
    $db = new PDO('mysql:host=127.0.0.1; dbname=erdeve', 'david', 'root');
}
catch(exception $e) {
    die('Erreur '.$e->getMessage());
}
?>