<?php 
	require 'dbconnect.php';
	require 'backendheader.php';
?>
<div class="container">
	<div class="card shadow">
	<div class="card-header">
		<h3>Add New User</h3>
	</div>
	<form action="add_user.php" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row my-3">
				<div class="col-lg-2">
					<label>Profile Photo : </label>
				</div>
				<div class="col-lg-10">
					<input type="file" name="image">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Name : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter Name" class="form-control" name="name">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Username : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter User Name" class="form-control" name="username">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Password : </label>
				</div>
				<div class="col-lg-10">
					<input type="password" placeholder="Enter Password" class="form-control" name="password">
				</div>
			</div>
			<div class="row my-3">
				<div class="col-lg-2">
					<label> Department : </label>
				</div>
				<div class="col-lg-10">
					<?php 
						$sql ="SELECT * FROM department";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$departments = $stmt->fetchAll();
						foreach ($departments as $department) {
							$name=$department['name'];	
							$id = $department['id'];				
				 	?>
					<select class="form-control" name="dept_id">
						<option>Choose Department</option>
						<option><?php echo $name?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mr-3 ml-4 " style="float: right;"> <i class="fas fa-save"></i> Save Changes </button>
		</div>
	</form>
</div>
</div>

<?php 
	require 'backendfooter.php';
?>