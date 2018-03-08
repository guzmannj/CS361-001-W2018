<?php

$servername = 'oniddb.cws.oregonstate.edu';
$dbname = 'wrighch3-db';
$username = 'wrighch3-db';
$password = 'i2qCzZDg1Eyg6Uhn';

$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
try {
    //$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   // $conn = null;
?>