<?php 
	require 'dbconnect.php';
	require 'backendheader.php';
	$edit_id = $_GET['edit_id'];
	$sql = "SELECT * FROM users WHERE id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$edit_id);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
	<div class="card shadow">
	<div class="card-header">
		<h3>Edit User</h3>
	</div>
	<form action="user_update.php" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row my-4">
				<div class="col-lg-2">
					<label> USer ID : </label>
				</div>
				<div class="col-lg-10">
					<input type="text"  value="<?php echo $user['id'] ?>" class="form-control" name="id" readonly="true">
				</div>
			</div>
			<div class="row my-4">
				<div class="col-md-2 col-sm-2">
					<label>Profile Photo : </label>
					<input type="hidden" name="oldphoto" value="<?php echo $user['photo'] ?>">
				</div>
				<div class="col-md-10 col-sm-10">
					<ul class="nav nav-tabs" >
						<li class="nav-item">
							<a href="#old" data-toggle="tab" class="nav-link active" >Old Profile</a>
						</li>
						<li class="nav-item">
							<a href="#new" class="nav-link" data-toggle = "tab">New Profile</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="old" class="tab-pane active">
							<img src="<?php echo $user['photo'] ?>" class="img-fluid" width="100px" height="70px">

						</div>
						<div id="new" class="tab-pane fade ">
							<input type="file" name="newphoto">
						</div>
					</div>
				</div>	
			</div>
			<div class="row my-4">
				<div class="col-lg-2">
					<label> Name : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter Name" value="<?php echo $user['name'] ?>" class="form-control" name="name">
				</div>
			</div>
			<div class="row my-4">
				<div class="col-lg-2">
					<label> Username : </label>
				</div>
				<div class="col-lg-10">
					<input type="text" placeholder="Enter Email" value="<?php echo $user['username'] ?>" class="form-control" name="username">
				</div>
			</div>
			<div class="row my-4">
				<div class="col-lg-2">
					<label> Password : </label>
				</div>
				<div class="col-lg-10">
					<input type="password" placeholder="Enter Password" value="<?php echo $user['password'] ?>" class="form-control" name="password">
				</div>
			</div>
			<button type="submit" class="btn btn-primary mr-3 ml-4 my-4 " style="float: right;"> <i class="fas fa-save"></i> Update </button>
		</div>
	</form>
</div>
</div>
<?php 
	require 'backendfooter.php';
?>