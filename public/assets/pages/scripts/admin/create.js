$(document).ready(function() {
  validationsys.validationGeneral('form-general');
  $('#icon').on('blur', function() {
    $('#show-icon').removeClass().addClass('fa fa-fw '+ $(this).val());
  })
})