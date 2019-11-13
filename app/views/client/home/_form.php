

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Date</label>
      <input type="text" class="form-control reservation" name="date" value="<?php echo date('d/m/Y') ?>">
    </div>
    <div class="form-group">
      <label>From - to</label><br>
      <?php
      if ($data['slots']->num_rows > 0) {
        while ($slot = $data['slots']->fetch_assoc()) {
          ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="slot_ids[]" value="<?php echo $slot['id'] ?>" id="slot-<?php echo $slot['id'] ?>">
            <label class="form-check-label" for="slot-<?php echo $slot['id'] ?>"><?php echo $slot['time'] ?></label>
          </div>
      <?php
        }
      }
      ?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Attendees</label>
      <input type="text" class="form-control" name="attendees">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Your name</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control">
    </div>
    <input type="hidden" name="status" value="1">
  </div>
</div>