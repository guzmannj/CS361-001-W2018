<?php

include('connect_sql.php');

$activity = $_POST['activity'];
$time_dis = $_POST['time'];
//test variables above ^^
$min_time_dis = 0;
$max_time_dis = 10000;

if(is_string(activity) == true){
	if(filter_var($time_dis, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min_time_dis, "max_range"=>$max_time_dis))) === false){
		try {

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
	}else{
		echo "Not a set goal integer";
	}
}else{
	echo "Not a set goal string";
}
