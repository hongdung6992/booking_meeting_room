<?php
if ($data['rooms']->num_rows > 0) {
  $index = 0;
  while ($room = $data['rooms']->fetch_assoc()) {
    $index++;
    $status = $room['status'] == 0 ? 'Empty' : 'Booking';
    $class  = $room['status'] == 0 ? 'danger' : 'success';
    ?>
    <tr>
      <td class="text-center"><?= $index ?></td>
      <td class="text-center">
        <img src="<?= ROOT_URL . "/public/images/uploads/" . $room['image'] ?>" width="100" height="60">
      </td>
      <td><?= $room['name'] ?></td>
      <td class="text-center"><?= $room['capacity'] ?></td>
      <td class="text-center">
        <a href="<?= ROOT_URL . "/booking/list/" . $room['id'] ?>"><?= countBooking($room['id']) ?></a>
        
      </td>
      <td class="text-center">
        <span class="badge badge-<?= $class ?>"><?= $status ?></span>
      </td>
    </tr>

<?php
  }
}
?>