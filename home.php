<?php 
	require 'dbconnect.php';
	require 'frontendheader.php';
?>
<div class="container">
  <div class="row">
    <?php
      $sql = "SELECT * FROM rooms";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $rooms=$stmt->fetchAll();
      foreach ($rooms as $room) {
          $id=$room['id'];
          $name = $room['name'];
          $photo = $room['photo'];
    ?>
    <div class="col-md-4 col-sm-4">
      <div class="card shadow my-5">
        <div class="card-header">
          <h3 class="text-center"><?php echo $room['name']; ?></h3>
        </div>
        <div class="card-body">
          <img src="<?php echo $room['photo'] ?>" class="img-fluid">
        </div>
        <div class="card-footer">
          <a href="detail_book.php?detail_id=<?php echo $id ?>" class="btn btn-info w-100"><i class="fas fa-search-plus mr-2"></i>Detail</a>
        </div>
      </div>
    </div>
     <?php } ?>
  </div>

</div>
<?php 
	require 'frontendfooter.php';
?>