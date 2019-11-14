<?php
$date       = isset($data['booking']['date']) ? formatToDMY($data['booking']['date']) : date('d/m/Y');
$name       = isset($data['booking']['name']) ? $data['booking']['name'] : null;
$phone      = isset($data['booking']['phone']) ? $data['booking']['phone'] : null;
$email      = isset($data['booking']['email']) ? $data['booking']['email'] : null;
$attendees  = isset($data['booking']['attendees']) ? $data['booking']['attendees'] : null;
$status     = isset($data['booking']['status']) ? $data['booking']['status'] : 1;
$slotIds    = isset($data['booking']['slot_ids']) ? explode(',', $data['booking']['slot_ids']) : [];
?>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Date</label>
      <input type="text" class="form-control reservation" name="date" value="<?= $date ?>">
    </div>
    <div class="form-group">
      <label>From - to</label><br>
      <?php
      if ($data['slots']->num_rows > 0) {
        while ($slot = $data['slots']->fetch_assoc()) {
          $checked = in_array($slot['id'], $slotIds) ? 'checked' : ''
          ?>
          <div class="form-check form-check-inline">
            <input 
              class="form-check-input" 
              type="checkbox" name="slot_ids[]" 
              value="<?= $slot['id'] ?>" 
              id="slot-<?= $slot['id'] ?>" 
              <?= $checked ?>
            >
            <label class="form-check-label" for="slot-<?= $slot['id'] ?>"><?= $slot['time'] ?></label>
          </div>
      <?php
        }
      }
      ?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Attendees</label>
      <input type="text" class="form-control" name="attendees" value="<?= $attendees ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Full name</label>
      <input type="text" name="name" class="form-control" value="<?= $name ?>">
    </div>
    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= $phone ?>">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" value="<?= $email ?>">
    </div>
    <input type="hidden" name="status" value="<?= $status ?>">
  </div>
</div>