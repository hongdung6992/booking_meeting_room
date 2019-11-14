<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Bookings list</h3>
      </div>
      <div class="card-body">
        <table id="booking-table" class="table table-bordered table-striped" data-url="<?php echo ROOT_URL . '/booking/reloadData' ?>">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Full name</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Email</th>
              <th class="text-center">Room</th>
              <th class="text-center">Date</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
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
<?php include_once './app/views/shared/_modal_confirm_delete.php' ?>

<?php include_once '_js.php' ?>