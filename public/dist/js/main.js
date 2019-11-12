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

  $(".daterangepicker-field").daterangepicker({
    showDropdowns: true,
    autoUpdateInput: false,
    setDate: '',
    locale: {
      format: 'DD/MM/YYYY',
    }
  });

  $('.daterangepicker-field').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });

  $('.daterangepicker-field').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });

 
});

