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