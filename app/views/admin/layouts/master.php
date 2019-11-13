<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Booking system</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once 'css.php' ?>
  <?php require_once 'js.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include_once 'navbar.php' ?>
    <?php include_once 'sidebar.php' ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

          </div>
        </div>
      </section>
      <section class="content">
        <?php include_once './app/views/admin/' . $data['page'] . '.php' ?>
      </section>
    </div>
    <?php include_once 'footer.php' ?>
  </div>

</body>

</html>