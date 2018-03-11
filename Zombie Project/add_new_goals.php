<?php

include('connect_sql.php');

$activity = $_POST['activity'];
$time_dis = $_POST['time'];

try {
    $sql =$conn->prepare("INSERT INTO goal (activity, dist) VALUES (:activity, :time_dis)");
    $sql->bindParam(':activity', $activity);
    $sql->bindParam(':time_dis', $time_dis);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $activity = $_POST['activity'];
    $time_dis = $_POST['time']; 

    $sql->execute();

    echo "New record created successfully";
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

