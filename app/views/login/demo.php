<script>
  // copy account
  $(document).ready(() => {
    $.each($('.copy'), function(key, value) {
      $(value).on('click', e => {
        let email = $(this).parents('.account-group').find('p.email').text().substring(7);
        let password = $(this).parents('.account-group').find('p.password').text().substring(10);
        $('input[name="email"]').val(email);
        $('input[name="password"]').val(password);
      })
    });
  });
</script>