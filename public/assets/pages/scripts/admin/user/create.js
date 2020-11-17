$(document).ready(function() {
 const rules = {
   re_password: {
     equalTo: "#password"
   }
 };
 const messages = {
   re_password: {
     equalTo: 'Las contraseñas no conciden'
   }
 };
 SysAyr.validationGeneral('form-general', rules, messages);
 $('#password').on('change', function() {
   const valor = $(this).val();
   if(valor != '') {
      $('#re_password').prop('required', true);
   } else {
    $('#re_password').prop('required', false);
   }
 })
});