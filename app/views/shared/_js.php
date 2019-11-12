<script>
  $(document).ready(function() {
    <?php
    if (isset($_SESSION['status'])) {
      $message = ($_SESSION['status'] === 'success') ? 'Logged in successfully!' : 'Email or password is incorrect!';
      ?>
      toastr.<?php echo $_SESSION['status'] ?>("<?php echo $message ?>");
    <?php
    }
    ?>
  });
</script>