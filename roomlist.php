<?php
	
	require('backendheader.php');
  include 'dbconnect.php';
?>
<div class="container">
  <div class="card shadow">
    <div class="card-header">
      <div class="row">
      <div class="col-md-6 col-sm-6">
        <h3 >Add New Room</h3>
      </div>
      <div class="col-md-6 col-sm-6">
        <a href="room_new.php" style="float: right;" class="btn btn-outline-dark"><i class="fas fa-plus mr-2" ></i>Add New Room</a>
      </div>
    </div>
  </div>
    <div class="card-body">
      <table class="table table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Room Name</th>
            <th>Room Photo</th>
              <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM rooms";
              $stmt = $pdo->prepare($sql);
              $stmt->execute();
              $rooms = $stmt->fetchAll();
              $i = 1;
              foreach ($rooms as $room) {
                $id = $room['id'];
                $name = $room['name'];
                $photo = $room['photo'];  
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $name; ?></td>
            <td><img src="<?php echo $photo; ?>" width="40px" height="40px"></td>
            <td>
              <table class="table" border="0">
                <td>
                  <a href="room_edit.php?update_id=<?php echo $id; ?>" class="btn btn-outline-info">Edit</a>
                </td>
                <td>
                  <a href="detail_room.php?detail_id=<?php echo $id; ?>" class="btn btn-outline-warning">Detail</a>
                </td>
                <td>
                  <a href="room_delete.php?delete_id=<?php echo $id; ?>" class="btn btn-outline-danger" onclick="return confirm('Are You Sure You want to delete?')">Delete</a>
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

	require('backendfooter.php');
?>