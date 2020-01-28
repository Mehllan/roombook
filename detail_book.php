<?php 
	require 'dbconnect.php';
	require 'frontendheader.php';
	$id = $_GET['detail_id'];
	$sql = "SELECT * FROM rooms WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$room = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
<div class="container">
	<div class="card shadow my-5">
		<div class="card-header">
			<h3 class="text-center"><?php echo $room['name'] ?> Detail Information</h3>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Room Picture</th>
						<th>Information</th>
						<th>Status</th>
						<th>Operation</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img src="<?php echo $room['photo'] ?>" width="100px" height="100px"></td>
						<td>Location : <?php echo $room['location'] ?><br>Capacity : <?php echo $room['capacity'] ?></td>
						
						<td>
							<?php 
								$sql = "SELECT * FROM booking";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$bookings = $stmt->fetchAll();
								foreach ($bookings as $booking) {
							?>
								<?php echo $booking['mdate'] ?> | <?php echo $booking['starttime'] ?> ~ <?php echo $booking['endtime'] ?> | <?php echo $booking['subject'] ?> | <?php echo $booking['username'] ?><br>
							<?php } ?>
						</td>
					
						<td><a href="booking.php?id=<?php echo $room['id'] ?>" class="btn btn-outline-info">Book</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
 <?php 
 	require 'frontendfooter.php';
  ?>