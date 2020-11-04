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
          return true;
        }
      });
    },
  }
} ();

var SysAyr = function () {
  return {
    notification: function(message, title, type) {
      toastr.options = {
        closeButton: true,
        newestOnTop: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        timeOut: '5000'
      };
      if (type == 'error') {
        toastr.error(message, title);
      } else if (type == 'success') {
        toastr.success(message, title);
      } else if (type == 'info') {
        toastr.info(message, title);
      } else if (type == 'warning') {
        toastr.warning(message, title)
      }
    },
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
          return true;
        }
      });
    },
  } 
} ();



