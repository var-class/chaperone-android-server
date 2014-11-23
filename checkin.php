<?php
	
	include "init.php";
	
	$userId = $_POST["userId"];
	$status = $_POST["status"];
	$latitude = $_POST["latitude"];
	$longitude = $_POST["longitude"];
	$date = date("Y-m-d H:i:s");
	
	if($stmt = $mysqli->prepare("insert into checkins(userId, latitude, longitude, checkinTime) values(?, ?, ?, ?)")){
		if($stmt->bind_param("ssss", $userId, $latitude, $longitude, $date)){
			if($stmt->execute()){
				$mysqli->query("update users set status='{$status}', lastCheckin='{$date}' where userId='{$userId}'");
			}
		}
	}
?>
