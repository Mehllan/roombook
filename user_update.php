<?php 
	require 'dbconnect.php';
	$id = $_POST['id'];
	$oldphoto = $_POST['oldphoto'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$newphoto = $_FILES['newphoto'];
	if($newphoto['name']){
		$file_path = "image/user/".$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'], $file_path);
	}else{
		$file_path= $oldphoto;
	}
	$sql = "UPDATE users SET id=:id,name=:name,username=:username,password=:password,photo=:photo WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':username',$username);
	$stmt->bindParam('password',$password);
	$stmt->bindParam(':photo',$file_path);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:user_list.php');
	}else{
		echo "ERROR!!!";
	}
?>