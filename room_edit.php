<?php 
	require('backendheader.php');
	include 'dbconnect.php';
	$update_id = $_GET['update_id'];
	$sql = "SELECT * FROM rooms WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$update_id);
	$stmt->execute();
	$room = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="card">
	<div class="card-header">
		<h3>Add New Room</h3>
	</div>
	<form action="room_update.php" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row my-3">
				<div class="col-md-2 col-sm-2">
					<label>Room ID : </label>
				</div>
				<div class="col-md-10 col-sm-10">
					<input type="text" name="id" name="id" class="form-control" value="<?php echo $room['id'] ?>" readonly="true">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-md-2 col-sm-2">
					<label>Room Photo : </label>
				</div>
				<div class="col-md-10 col-sm-10">
					
						<input type="hidden" name="oldphoto" value="<?php echo $room['photo'] ?>">
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Room Photo</a>
								<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>

							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<img src="<?php echo $room['photo'] ?>" class="py-3 w-25 h-25">
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<input type="file" name="newphoto" class="form-control-file small" id="choosePhoto">
							</div>

						</div>
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Room Name : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter Name" class="form-control" name="name" value="<?php echo $room['name']; ?>">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-10">
					<button type="submit" class="btn btn-outline-primary"> <i class="fas fa-save mr-2"></i> Update </button>
				</div>
			</div>
			
		</div>
	</form>
</div>
<?php 
	require 'backendfooter.php';
?>