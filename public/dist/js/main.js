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

