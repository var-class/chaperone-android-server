<?php
	
	include "init.php";
	include "gcm.php";
	
	$regid = $_POST["regid"];
	
	if($stmt = $mysqli->prepare("insert into users(regid) values(?)")){
		if($stmt->bind_param("s", $regid)){
			if($stmt->execute()){
				$userId = $stmt->insert_id;
				$data = array( "responseType" => 1, 'userId' => $userId );
				$ids = array( $regid );
				sendGoogleCloudMessage($data, $ids);
			}
		}
	}

	
?>
