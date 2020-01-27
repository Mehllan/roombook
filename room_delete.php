<?php
	require 'dbconnect.php';
	$delete_id = $_REQUEST['delete_id'];
	$sql = "DELETE FROM rooms WHERE id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$delete_id);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:roomlist.php');
	}else{
		echo "Error!!!";
	}

?>