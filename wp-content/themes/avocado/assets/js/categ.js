jQuery(document).ready(function() {
    jQuery('.category').click(function() {
      jQuery(this).find('input[type="radio"]').prop('checked', true);
      jQuery('.category').removeClass('active')
      jQuery(this).toggleClass('active')
    });
});
