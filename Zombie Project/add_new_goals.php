<?php

include('connect_sql.php');

$activity = $_POST['activity'];
$time_dis = $_POST['time'];

try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql =$conn->prepare("INSERT INTO goal (activity, dist) VALUES (:activity, :time_dis)");
    $sql->bindParam(':activity', $activity);
    $sql->bindParam(':time_dis', $time_dis);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $activity = $_POST['activity'];
    $time_dis = $_POST['time']; 
    // use exec() because no results are returned
    $sql->execute();


    echo "New record created successfully";
    }
catch(PDOException $e)
    {
        
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
