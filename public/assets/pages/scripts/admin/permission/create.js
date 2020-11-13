$(document).ready(function() {
  validationsys.validationGeneral('form-general');
  $("#gtvpmss_desc").on('change', function() {
    $('#gtvpmss_slug').val($(this).val().toLowerCase().replace(/ /g, '-'))
  })
});