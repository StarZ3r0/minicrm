$(document).ready(function () {
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

  $('.raty').raty({
    starType: 'i',
    scoreName: 'rating',
    score: 3,
    hints: ['Rossz', 'Gyenge', 'Átlagos', 'Nagyon jó', 'Kiváló']
  });
});