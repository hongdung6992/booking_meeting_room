<script>
  $(document).ready(function() {
    <?php
    if (isset($_SESSION['status'])) {
      $message = ($_SESSION['status'] === 'success') ? 'Booking successfully!' : 'Error booking!';
      ?>
      toastr.<?php echo $_SESSION['status'] ?>("<?php echo $message ?>");
    <?php
    }
    ?>
  });
</script>