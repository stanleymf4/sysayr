$(document).ready(function() {
  //cerrar las alertas automaticamente
  $('.alert[data-auto-dismiss]').each(function (index, element) {
    const $element = $(element),
    timeout = $element.data('auto-dismiss') || 5000;
    setTimeout(function () {
      $element.alert('close');
    }, timeout);
  });
  //TOOLTIPS
  $('body').tooltip({
    trigger: 'hover',
    selector: '.tooltipsC',
    placement: 'top',
    html: true,
    container: 'body'
  });
  $('ul.nav-sidebar').find('a.active').parents('li').addClass(' menu-open ');
  //Trabajo con ventana de roles
  const modal = $("#modal-seleccionar-rol");
  if(modal.length && modal.data('rol-set') == 'NO') {
    modal.modal('show');
  }

  $(".asignar-rol").on("click", function(event) {
    event.preventDefault();
    const data = {
      rol_id: $(this).data('rolid'),
      rol_name: $(this).data('rolnombre'),
      _token: $('input[name=_token]').val()
    }
    ajaxRequest(data, '/ajax-session', 'asignar-rol')
  });

  $('.cambiar-rol').on('click', function(event) {
    event.preventDefault();
    modal.modal('show');
  })

  function ajaxRequest(data, url, funcion) {
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        if(funcion == 'asignar-rol' && response.messages == 'ok') {
          $('#modal-seleccionar-rol').hide();
          location.reload();
        }
      }
    })
  }
});