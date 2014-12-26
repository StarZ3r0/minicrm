$(document).ready(function () {
  $(".alert-success").delay(2000).fadeOut(1000);

  $('.button-delete-confirm').submit(function(event) {
    event.preventDefault();
    var self = this;
    bootbox.dialog({
      message: "Biztosan törlöd? A kért művelet nem visszavonható!",
      buttons: {
        success: {
          label: "Igen",
          className: "btn-success",
          callback: function() {
            self.submit();
          }
        },
        danger: {
          label: "Mégsem",
          className: "btn-danger",
          callback: function() {
          }
        }
      }
    });
	});
});