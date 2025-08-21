jQuery(document).ready(function ($) {
  "use strict";

  function toggleImageFields() {
    var nombreImages =
      parseInt($("#customize-control-hero_background_count input").val()) || 3;

    for (var i = 0; i < 15; i++) {
      var control = $("#customize-control-hero_background_" + i);
      if (control.length) {
        if (i < nombreImages) {
          control.show();
        } else {
          control.hide();
        }
      }
    }
  }

  toggleImageFields();

  $(document).on(
    "change",
    "#customize-control-hero_background_count input",
    function () {
      toggleImageFields();
    }
  );

  wp.customize("hero_background_count", function (value) {
    value.bind(function (newval) {
      toggleImageFields();
    });
  });
});
