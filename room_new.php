<?php

	include 'dbconnect.php';
	require('backendheader.php');

?>
<div class="card">
	<div class="card-header">
		<h3>Add New Room</h3>
	</div>
	<form action="add_room.php" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row my-3">
				<div class="col-lg-2">
					<label>Room Photo : </label>
				</div>
				<div class="col-lg-10">
					<input type="file" name="image">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Room Name : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter Name" class="form-control" name="name">
				</div>
			</div>
			<button type="submit" class="btn btn-primary mr-3 ml-4 " style="float: right;"> <i class="fas fa-save"></i> Save Changes </button>
		</div>
	</form>
</div>

<?php

	require('backendfooter.php');
?>