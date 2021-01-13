jQuery(document).ready(function($) {
  $('.white-label-color').iris({
    width: 250,
    palettes: true,
    change: function(event, ui) {
      // event = standard jQuery event, produced by whichever control was changed.
      // ui = standard jQuery UI object, with a color member containing a Color.js object
      $(".white-label-upgrade-pro.white-label-branding").css('background-color', ui.color.toString());
      $("input.white-label-color").css('background-color', ui.color.toString());
    }
  });
});
