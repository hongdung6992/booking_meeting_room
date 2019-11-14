<form method="POST" action="<?= ROOT_URL ?>/room/index" class="d-block">
  <div class="row mb-3">
    <div class="col-md-3">
      <input type="text" name="date" class="form-control reservation" value="<?= isset($_POST['date']) ? $_POST['date'] : date('d/m/Y') ?>">
    </div>
    <div class="col-md-1">
      <input type="submit" class="btn btn-primary" value="Search">
    </div>
  </div>
</form>

<?php include_once '_count.php' ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Meeting rooms</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Image</th>
              <th class="text-center">Room</th>
              <th class="text-center">Capacity</th>
              <th class="text-center">Bookings</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php include_once '_tbody.php' ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once './app/views/shared/_js.php' ?>