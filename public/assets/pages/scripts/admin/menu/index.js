$(document).ready(function () {
  $('#nestable').nestable().on('change', function () {
    const data = {
      menu: window.JSON.stringify($('#nestable').nestable('serialize')),
      _token: $('input[name=_token]').val()
    };
    $.ajax({
      url:'/admin/menu/storeOrder',
      type: 'POST',
      dataType: 'JSON',
      data: data,
      success: function(answer) {

      }
    });
  });
$('.eliminar-menu').on('click', function(event) {
  event.preventDefault();
  const url = $(this).attr('href');
  swal({
    title: '¿ Está seguro que desea eliminar el registro ?',
    text: "Está acción no se puede deshacer!",
    icon: "warning",
    showCancelButton: true,
    showConfirmButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
  },
  function (isConfirm) {
    if (isConfirm) {
      window.location.href = url;
    } 
  });
  
  /* .then((value) => {
    if (value) {
      window.location.href = url;
    }
  }); */
})

  $('#nestable').nestable('expandAll');
});



