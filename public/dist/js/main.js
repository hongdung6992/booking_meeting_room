$(document).ready(function () {
  $('.reservation').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    setDate: '',
    locale: {
      format: 'DD/MM/YYYY',
    }
  });

  $('.reservation').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });

  $('.reservation').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });
});

$(document).ready(() => {
  $('.modal-booking').on('show.bs.modal', e => {
    let id = $(e.relatedTarget).data('id');
    let room = $(e.relatedTarget).data('room');
    $('input[name="room_id"]').val(id);
    $('.modal-booking h5').text('Your booking room: ' + room);
  })
})

$(document).ready(function () {

  // update booking status
  $(document).on('click', ".booking-status", function (e) {
    let status = $(e.target).data('status');
    let url = $(this).parents('div').data('url');
    $.ajax({
      type: "POST",
      url: url,
      data: { status },
      dataType: "json",
      success: function (response) {
        if (response.status === 'success') {
          reloadData();
        }
      }
    });
  })

  // delete booking
  $('#modal-confirm-delete').on('show.bs.modal', function (e) {
    let url = $(e.relatedTarget).data('url');

    $('#confirm-delete').one('click', function () {
      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            $('#modal-confirm-delete').modal('hide');
            reloadData();
            toastr.success(response.message);
          } else {
            toastr.danger(response.message);
          }
        },
      });
    })
  });


  function reloadData() {
    url = $('#booking-table').data('url')
    $.ajax({
      type: "GET",
      url: url,
      dataType: "html",
      success: function (response) {
        $('#booking-table tbody').html(response);
      }
    });
  }
})

