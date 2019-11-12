<?php
if ($data['rooms']->num_rows > 0) {
  while ($room = $data['rooms']->fetch_assoc()) {
    ?>
    <div class="col-md-6 room-inner">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-auto d-none d-lg-block">
          <img src="<?php echo ROOT_URL ?>/public/images/uploads/<?php echo $room['image']?>" alt="">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0"><?php echo $room['name'] ?></h3>
          <div class="mb-1 text-muted">Capacity: <?php echo $room['capacity']?></div>
          <p class="mb-auto description"><?php echo $room['descriptions'] ?></p>
          <a href="#" class="btn btn-primary">Booking this room</a>
        </div>
      </div>
    </div>

<?php
  }
}
?>