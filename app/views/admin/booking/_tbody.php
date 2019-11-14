<?php
if ($data['bookings']->num_rows > 0) {
  $index = 0;
  while ($booking = $data['bookings']->fetch_assoc()) {
    $index++;
    if ($booking['status'] == 0) { 
      $status = 'Cancelled';
      $class = 'secondary';
    } else if ($booking['status'] == 1) {
      $status = 'Planning';
      $class = 'warning';
    } else {
      $status = 'Confirmed';
      $class = 'success';
    }
    ?>
    <tr>
      <td class="text-center"><?= $index ?></td>
      <td><?= $booking['name'] ?></td>
      <td><?= $booking['phone'] ?></td>
      <td class="text-center"><?= $booking['email'] ?></td>
      <td class="text-center"><?= $booking['room'] ?></td>
      <td class="text-center"><?= formatToDMY($booking['date']) ?></td>
      <td class="text-center">
        <div class="dropdown">
          <button class="btn btn-<?= $class ?> dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <?= $status ?>
          </button>
          <div class="dropdown-menu" data-url="<?php echo ROOT_URL . '/booking/status/' . $booking['id'] ?>">
            <button class="dropdown-item booking-status" data-status="1">Planning</button>
            <button class="dropdown-item booking-status" data-status="2">Confirmed</button>
            <button class="dropdown-item booking-status" data-status="0">Cancelled</button>
          </div>
        </div>
      </td>
      <td class="text-center">
        <a href="<?= ROOT_URL . "/booking/edit/" . $booking['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-confirm-delete" data-url="<?php echo ROOT_URL . '/booking/delete/' . $booking['id'] ?>"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
<?php
  }
}else{
  echo '<tr><td colspan="8">Data empty!</td></tr>';
}
?>