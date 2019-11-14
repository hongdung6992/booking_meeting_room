<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total of meeting rooms</span>
        <span class="info-box-number"><?= $data['count']['total']['amount'] ?></span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Empty meeting rooms</span>
        <span class="info-box-number"><?= $data['count']['empty'] ?></span>
      </div>
    </div>
  </div>
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Meeting rooms booked</span>
        <span class="info-box-number"><?= $data['count']['booked'] ?></span>
      </div>
    </div>
  </div>
</div>