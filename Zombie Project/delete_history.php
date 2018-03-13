<?php
include('connect_sql.php');
$check = $_POST['postcheck'];
    //Delete the data
    $sql = "DELETE FROM history" ;
    $conn->query($sql);
?>