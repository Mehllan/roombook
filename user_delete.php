<?php 
	require 'dbconnect.php';
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM users WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:user_list.php');
	}else{
		echo "ERROR!!!";
	}
 ?>
