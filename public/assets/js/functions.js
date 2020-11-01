var validationsys = function () {
  return {
    validationGeneral: function (id_, rules_, messages_) {
      const formu = $('#' + id_);
      formu.validate({
        rules: rules_,
        messages: messages_,
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        highlight: function (element, errorClas, validClass) {
          $(element).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function(element) {
          $(element).closest('.form-control').removeClass('is-invalid');
        },
        success: function(label) {
          label.closest('.form-control').removeClass('is-invalid');
        },
        errorPlacement: function (error, element) {
          if ($(element).is('select') && element.hasClass('bs-select')) {
            element.insertAfter(element).addClass('error invalid-feedback');
          } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
            element.next().after(error).addClass('error invalid-feedback');
          } else if (element.attr("data-error-container")) {
            error.appendTo(element.attr("data-error-container").addClass('error invalid-feedback'));
          } else {
            error.insertAfter(element).addClass('error invalid-feedback');
          }
        },
        invalidHandler: function(event, validator) {

        },
        submitHandler: function(formu) {

        }
      });
    },
  }
} ();