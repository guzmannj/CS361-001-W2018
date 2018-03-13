<?php
// You will need to enter your own credentials here.
// I provided the link to the database you will need to create in the Announcements on Canvas.
// You can either make your own with the correct tables or ask me for a copy of it. 
$servername = 'oniddb.cws.oregonstate.edu';
$dbname = 'wrighch3-db';
$username = 'wrighch3-db';
$password = 'A2OQRIFXnnzmr3E0';

$conn = new PDO("mysql:host=$servername; dbname=$dbname; charset=utf8", $username, $password, 
            [PDO::ATTR_EMULATE_PREPARES => false, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected ";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   // $conn = null;
?>