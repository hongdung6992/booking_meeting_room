<?php
if ($data['rooms']->num_rows > 0) {
  while ($room = $data['rooms']->fetch_assoc()) {
    ?>
    <div class="col-md-6 room-inner">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block">
          <img src="<?php echo ROOT_URL ?>/public/images/uploads/<?php echo $room['image'] ?>" alt="">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">Room: <?php echo $room['name'] ?></h3>
          <div class="mb-1 text-muted">Capacity: <?php echo $room['capacity'] ?></div>
          <p class="mb-auto py-3"><?php echo $room['descriptions'] ?></p>
          <button 
            class="btn btn-primary" 
            data-toggle="modal" 
            data-target=".modal-booking" 
            data-id="<?php echo $room['id'] ?>"
            data-room="<?php echo $room['name'] ?>"
          >Book this room</button>
        </div>
      </div>
    </div>
<?php
  }
}
?>