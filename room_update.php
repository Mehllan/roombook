<?php
	require 'dbconnect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$oldphoto = $_POST['oldphoto'];
	$newphoto = $_FILES['newphoto'];
	if ($newphoto['name']) {
		$file_path="image/item/".$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'], $file_path);

	}
	else{
		$file_path=$oldphoto;
	}

	$sql = "UPDATE rooms SET id=:id,name=:name,photo=:photo WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':photo',$file_path);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:roomlist.php');
	}else{
		echo "Error!!!";
	}

?>