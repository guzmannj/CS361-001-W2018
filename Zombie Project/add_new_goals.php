<?php

include('connect_sql.php');

$activity = $_POST['activity'];
$time_dis = $_POST['time'];

$message = '';

if($time_dis <=0) $message = "Time should be more than 1 minute";
else{
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
$conn = null;}
if($message != ""){
echo '<script language="javascript"> alert("'.$message.'")</script>';
}

?>
