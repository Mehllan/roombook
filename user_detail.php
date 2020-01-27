<?php 
	require 'dbconnect.php';
	require 'backendheader.php';
	$id = $_GET['detail_id'];
	$sql = "SELECT * FROM users WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$user=$stmt->fetch(PDO::FETCH_ASSOC);
 ?>
 <div class="container">
		<div class="card shadow">
			<div class="card-header">
				<h3 class="text-center">User Details</h3>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-3">
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="card-body">
						<div class="container">
							<div class="card-header">
							<h5 class="text-center"><?php echo $user['name'] ?></h5>
							<p class="text-center"><?php echo $user['username'] ?> </p>
						</div>
						<div class="card-body">
							<img src="<?php echo $user['photo'] ?>" class="img-fluid" style="margin-right: 200px">
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
				</div>
			</div>
			
		</div>
	</div>

 <?php 
 	require 'backendfooter.php';
  ?>