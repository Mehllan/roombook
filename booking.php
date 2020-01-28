
<?php 
	require 'dbconnect.php';
	require 'frontendheader.php';
 ?>
<div class="container">
	<div class="card shadow my-5">
		<div class="card-header">
			<?php 
				$id = $_GET['id'];
				$sql="SELECT * FROM rooms WHERE id=:id";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':id',$id);
				$stmt->execute();
				$room = $stmt->fetch(PDO::FETCH_ASSOC);
			 ?>
			<h3 class="text-center"><?php echo $room['name'] ?> Meeting Room Booking</h3>
		</div>
		<div class="card-body">
			<form method="post" action="add_booking.php">
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>Subject :</span>
					</div>
					<div class="col-sm-10 col-md-10">
						<input type="text" name="subject" class="form-control" placeholder="Enter Subject">
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>Description :</span>
					</div>
					<div class="col-sm-10 col-md-10">
						<textarea type="text" name="description" rows="5" cols="100" class="form-control" placeholder="Enter Descrition ...."></textarea> 
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>User Name :</span>
					</div>
					<div class="col-sm-10 col-md-10">
						<input type="text" name="username" class="form-control" value="<?php echo $_SESSION['loginuser']['name'] ?>" readonly="true">
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>Meeting Date : </span>
					</div>
					<div class="col-sm-10 col-md-10">
						<input type="date" name="mdate" class="form-control">
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>Start Time :</span>
					</div>
					<div class="col-sm-10 col-md-10">
						<input type="time" name="starttime" class="form-control">
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2">
						<span>End Time :</span>
					</div>
					<div class="col-sm-10 col-md-10">
						<input type="time" name="endtime" class="form-control">
					</div>
				</div>
				<div class="row my-5">
					<div class="col-md-2 col-sm-2"></div>
					<div class="col-sm-10 col-md-10">
						<button type="submit" class="btn btn-outline-info mr-4"><i class="fas fa-save mr-2"></i>Save</button>
						<a  class="btn btn-outline-danger mr-4" data-toggle="modal" data-target="#mymodal"><i class="fas fa-times-circle mr-2"></i>Exit</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- My Modal -->
<div class="modal" id="mymodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Go To Home</h4>
				<button type="button" class="close" data-dismiss="modal">X</button>
			</div>
			<div class="modal-body">
				Are You Sure You want to Leave?....
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<a href="home.php" class="btn btn-outline-primary">OK</a>
			</div>
		</div>
	</div>
</div>
 <?php 
 	require 'frontendfooter.php';
  ?>