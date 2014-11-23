<?php
	
	include "gcm.php";
	include "init.php";
	
	$groupId = $_POST["groupId"];
	$userId = $_POST["userId"];
	
	if($stmt = $mysqli->prepare("insert into groups_users(userId, groupId) values(?, ?)")){
		if($stmt->bind_param("ss", $userId, $groupId)){
			if($stmt->execute()){
				$data = array( "responseType" => 2, "groupId" => $groupId);
				$ids = array( $regid );
				sendGoogleCloudMessage($data, $ids);
			}
		}
	}
	
?>
