<?php
	include "init.php";
	include "gcm.php";
	
	$groupId = $_POST["groupId"];
	
	$usersResult = $mysqli->query("select userId from groups_users where groupId='{$groupId}'");
	while($user = $usersResult->fetch_assoc()){
		$regid = $mysqli->query("select regid from users where userId='{$user["userId"]}'")->fetch_assoc();
		$regids[] = $regid["regid"];
	}
	
	$data = array("responseType" => 3);
	sendGoogleCloudMessage($data, $regids);
	
?>
