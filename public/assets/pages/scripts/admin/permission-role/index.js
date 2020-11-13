/* this es el iput checkbox de .menu-role */
$('.permiso_rol').on('change', function () {
  var data = {
    permiso_id: $(this).data('permisoid'),
    rol_id: $(this).val(),
    _token: $('input[name=_token]').val()
  };
  if ($(this).is(':checked')) {
    data.estado = 1
  } else {
    data.estado = 0
  }
  ajaxRequest('/admin/permission-role', data);
});

function ajaxRequest (url, data) {
  $.ajax({
    url: url,
    type: 'POST',
    data: data,
    success: function(response) {
        SysAyr.notification(response.response, 'Sistema AYR', 'success');
    }
  });
}