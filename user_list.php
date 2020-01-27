<?php 
	require 'dbconnect.php';
	require 'backendheader.php';
?>
<div class="container">
  <div class="card shadow">
    <div class="card-header">
      <div class="row">
      <div class="col-md-6 col-sm-6">
        <h3 >Add New User</h3>
      </div>
      <div class="col-md-6 col-sm-6">
        <a href="new_user.php" style="float: right;" class="btn btn-outline-dark"><i class="fas fa-plus mr-2" ></i>Add New User</a>
      </div>
    </div>
  </div>
    <div class="card-body">
      <table class="table table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th> Name</th>
            <th>User Name</th>
            <th>User Photo</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM users";
              $stmt = $pdo->prepare($sql);
              $stmt->execute();
              $users = $stmt->fetchAll();
              $i = 1;
              foreach ($users as $user) {
                $id = $user['id'];
                $name = $user['name'];
                $photo = $user['photo'];  
                $username = $user['username'];
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $username ?></td>
            <td><img src="<?php echo $photo; ?>" width="40px" height="40px"></td>
            <td>
              <table class="table" border="0">
                <td>
                  <a href="user_edit.php?edit_id=<?php echo $id ?>" class="btn btn-outline-info">Edit</a>
                </td>
                <td>
                  <a href="user_detail.php?detail_id=<?php echo $id ?>" class="btn btn-outline-warning">Detail</a>
                </td>
                <td>
                  <a href="user_delete.php?id=<?php echo $id ?>" class="btn btn-outline-danger"  onclick="return confirm('Are You Sure You want to delete?')">Delete</a>
                </td>
              </table>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php 
	require 'backendfooter.php';
?>