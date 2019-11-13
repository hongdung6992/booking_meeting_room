<main role="main" class="container">
  <div class="row">
    <div class="col-md-12 d-flex align-items-center mt-3 bg-purple rounded">
      <div class="w-100 p-3 shadow-sm bg-dark">
        <h1 class="mb-0lh-100 text-white">Detail about your booking</h1>
      </div>
    </div>

    <div class="col-md-6 my-3 rounded">
      <div class="shadow-sm p-3 bg-light">
        <h6 class="border-bottom border-gray pb-2 mb-0">Your booking</h6>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Room</strong>
            <?php
            if (!empty($data['room'])) {
              echo $data['room']->fetch_assoc()['name'];
            }
            ?>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Date</strong>
            <?php echo @$data['booking']['date'] ?>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">From - to</strong>
            <?php
            if (!empty($data['slots'])) {
              while ($slot = $data['slots']->fetch_assoc()) {
                echo $slot['time'] . '<br>';
              }
            }
            ?>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-gray">
            <strong class="d-block text-gray-dark">Attendees</strong>
            <?php echo @$data['booking']['attendees'] ?>
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 my-3 rounded">
      <div class="shadow-sm p-3 bg-light">
        <h6 class="border-bottom border-gray pb-2 mb-0">Your info</h6>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Full name</strong>
            <?php echo @$data['booking']['name'] ?>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Phone</strong>
            <?php echo @$data['booking']['phone'] ?>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-gray">
            <strong class="d-block text-gray-dark">Email</strong>
            <?php echo @$data['booking']['email'] ?>
          </p>
        </div>
      </div>

      <form method="POST" action="<?php echo ROOT_URL ?>/booking/save">
        <input type="hidden" name="booking" value='<?php echo serialize($_POST) ?>'>
        <input type="submit" class="btn btn-primary float-right mt-5" name="confirm" value="Confirm">
      </form>
    </div>
  </div>

</main>