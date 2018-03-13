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
    // use exec() because no results are returned
    $sql->execute();
    //Produce success message and redirect to homepage
    echo '<script type="text/javascript"> alert("Successfull added new goal"); window.location = "./index.php"; </script>';
    }
catch(PDOException $e)
    {
        
    echo '<script language="javascript"> alert("'. $sql . "<br>" . $e->getMessage(). '")</script>';
    }
$conn = null;}
if($message != ""){
echo '<script language="javascript"> alert("'.$message.'")</script>';
}

?>
