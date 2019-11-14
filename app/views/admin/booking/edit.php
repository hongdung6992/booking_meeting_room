<div class="row">
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit booking</h3>
      </div>
      <form method="POST" action="<?= ROOT_URL . "/booking/update/" . $data['booking']['id'] ?>">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Room</label>
            <select class="form-control" name="room_id">
              <?php
              if ($data['rooms']->num_rows > 0) {
                while ($room = $data['rooms']->fetch_assoc()) {
                  $selected = $room['id'] == $data['booking']['room_id'] ? 'selected' : '';
                  echo '<option ' . $selected . ' value=' . $room['id'] . '>' . $room['name'] . '</option>';
                }
              }
              ?>
            </select>
          </div>

          <?php include_once './app/views/client/home/_form.php' ?>

        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary float-right" value="Save" name="update">
          <a href="<?= ROOT_URL ?>/booking/list" class="btn btn-secondary float-right mr-2">Back</a>
        </div>
      </form>
    </div>
  </div>

</div>