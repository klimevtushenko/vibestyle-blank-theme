jQuery(document).ready(function ($) {
  $('.marquee_offset').marquee({
    direction: 'left',
    duration: 16000,
    gap: 0,
    delayBeforeStart: 100,
    duplicated: true,
    startVisible: true,
  });
});
