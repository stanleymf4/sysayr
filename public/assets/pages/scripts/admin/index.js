$(document).ready(function () {
  $("#tabla-data").on('submit', '.form-eliminar', function() {
    event.preventDefault();
    const form = $(this);
    swal({
      title: '¿ Está seguro que desea eliminar el registro ?',
      text: "¡Esta acción no se puede deshacer!",
      icon: 'warning',
      showCancelButton: true,
      showConfirmButton: true,
      confirmButtonText: 'Aceptar',
      cancelButtonText: 'Cancelar'
    },
    function (isConfirm) {
      if (isConfirm) {
        ajaxRequest(form);
      } 
    })
  });

  function ajaxRequest(form) {
    $.ajax({
      url: form.attr('action'),
      type:'POST',
      data: form.serialize(),
      success: function (response) {
        if (response.message == "ok") {
          form.parents('tr').remove();
          SysAyr.notification('El registro fue eliminado correctamente', 'Sistema AYR', 'success');
        } else {
          SysAyr.notification('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema AYR', 'error');
        }
      },
      error: function (){

      }
    })
  }
});