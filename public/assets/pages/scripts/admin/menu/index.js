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
  $('#nestable').nestable('expandAll');
});