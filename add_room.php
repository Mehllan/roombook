
<?php
	include 'dbconnect.php';

	$name = $_POST['name'];
	$image = $_FILES['image'];
	$location = $_POST['location'];
	$capacity = $_POST['capacity'];
	$source_dir = "image/item/";
	$file_path = $source_dir.$image['name'];
	move_uploaded_file($image['tmp_name'], $file_path);

	$sql = "INSERT INTO rooms (name,photo,location,capacity) VALUES (:name,:photo,:location,:capacity)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':location',$location);
	$stmt->bindParam(':capacity',$capacity);
	$stmt->execute();

	if($stmt->rowCount()){
		header("location:roomlist.php");
	}
	else{
		echo "Error ! ";
	}
?>
