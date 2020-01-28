<?php 
	require 'dbconnect.php';
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dept_id = $_POST['dept_id'];
	$image = $_FILES['image'];
	$status = 'Member';
	$source_dir = "image/user/";
	$file_path = $source_dir.$image['name'];
	move_uploaded_file($image['tmp_name'], $file_path);
	$sql = "INSERT INTO users (name,username,password,photo,status,dept_id) VALUES (:name,:username,:password,:photo,:status,:dept_id)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':username',$username);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':status',$status);
	$stmt->bindParam(':dept_id',$dept_id);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:user_list.php');
	}else{
		echo "ERROR!!!";
	}
?>

