<?php 
	require 'dbconnect.php';
	$name = $_POST['name'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username=:name AND password=:password";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam('password',$password);
	$stmt->execute();

	session_start();
	if($stmt->rowCount()<=0){
		if(!isset($_COOKIE['logInCount'])){
			$logInCount=1;
		}else{
			$logInCount = $_COOKIE['logInCount'];
			$logInCount++;
		}
		setcookie('logInCount',$logInCount,time()*100);
		if($logInCount>=3){
			header('location:loginfailed.php');
		}
		else{
			$_SESSION['login_reject']="Email and Password is not invalid";
			header('location:index.php');
		}
	}else{
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		var_dump($row);
		$_SESSION['loginuser'] = $row;
		if($row['status']=="Admin"){
			header('location:roomlist.php');
		}else{
			header('location:home.php');
		}
	}
 ?>