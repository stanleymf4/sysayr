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
});