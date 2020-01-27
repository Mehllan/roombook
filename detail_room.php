<?php
	require 'dbconnect.php';
	require 'backendheader.php';
	$detail_id= $_GET['detail_id'];
	$sql = "SELECT * FROM rooms WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$detail_id);
	$stmt->execute();
	$room = $stmt->fetch(PDO::FETCH_ASSOC);
?>
	<div class="container">
		<div class="card shadow">
			<div class="card-header">
				<h3 class="text-center">Room Details</h3>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-3">
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="card-body">
						<div class="container">
							<div class="card-header">
							<h5 class="text-center"><?php echo $room['name'] ?></h5>
						</div>
						<div class="card-body">
							<img src="<?php echo $room['photo'] ?>" class="img-fluid" style="margin-right: 200px">
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