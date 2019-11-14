<script>
  $(document).ready(function() {
    <?php
    if (isset($_SESSION['status'])) {
      $message = ($_SESSION['status'] === 'success') ?  'Record updating successfully' : 'Error updating record';
      ?>
      toastr.<?php echo $_SESSION['status'] ?>("<?php echo $message ?>");
    <?php
    }
    ?>
  });
</script>