<?php
include('connect_sql.php');
$id = $_POST['postid'];
$query = "SELECT * FROM goal";
$data = $conn->query($query);
if ($data->rowCount()){
	foreach($data as $row){
		if($row["goalid"] == $id){
			$sql = "INSERT INTO history (goalid, activity, dist) VALUES ('" .$row["goalid"]. "', '" .$row["activity"] . "', '" .$row["dist"]. "')";
		}
    }      
}
//Insert the data
$conn->exec($sql);
//Delete the data
$sql = "DELETE FROM goal WHERE goalid=$id" ;
$conn->query($sql)
?>