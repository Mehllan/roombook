<?php 
	require 'dbconnect.php';
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$username = $_POST['username'];
	$mdate = $_POST['mdate'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$sql = "INSERT INTO booking (subject,description,username,mdate,starttime,endtime) VALUES (:subject,:description,:username,:mdate,:starttime,:endtime)";
	$stmt =$pdo->prepare($sql);
	$stmt->bindParam(':subject',$subject);
	$stmt->bindParam(':description',$description);
	$stmt->bindParam(':username',$username);
	$stmt->bindParam(':mdate',$mdate);
	$stmt->bindParam('starttime',$starttime);
	$stmt->bindParam('endtime',$endtime);
	$stmt->execute();
	if($stmt->rowCount()){
		header('location:home.php');
	}else{
		echo "ERROR!!!";
	}

 ?>