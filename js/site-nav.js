// Fallback toggler for site navbar if Bootstrap collapse isn't working
// Uses Bootstrap's collapse if available, otherwise toggles the "show" class.
document.addEventListener('DOMContentLoaded', function() {
  var togglers = document.querySelectorAll('.navbar-toggler');
  togglers.forEach(function(toggler) {
    toggler.addEventListener('click', function(e) {
      var selector = this.getAttribute('data-target') || this.getAttribute('data-bs-target');
      if (!selector) return;
      var target = document.querySelector(selector);
      if (!target) return;

      // Prefer Bootstrap's collapse if jQuery/collapse are present
      if (typeof jQuery !== 'undefined' && jQuery(target).hasClass('collapse')) {
        try {
          jQuery(target).collapse('toggle');
          return;
        } catch (err) {
          // If something goes wrong, fall back to class toggle
        }
      }

      target.classList.toggle('show');
      this.setAttribute('aria-expanded', target.classList.contains('show'));
    });
  });

  // Detect when navbar items overflow and force burger mode when they don't fit on one line
  function checkNavOverflow() {
    var siteNavs = document.querySelectorAll('.site-nav');
    siteNavs.forEach(function(siteNav) {
      var collapse = siteNav.querySelector('.navbar-collapse');
      if (!collapse) return;
      var navList = collapse.querySelector('.navbar-nav');
      if (!navList) return;

      // reset any previous state to get accurate measurement
      siteNav.classList.remove('force-collapse');

      // measure whether items overflow horizontally
      var isOverflowing = navList.scrollWidth > navList.clientWidth + 2;

      if (isOverflowing) {
        siteNav.classList.add('force-collapse');
        // also ensure collapse is closed
        collapse.classList.remove('show');
        var toggler = siteNav.querySelector('.navbar-toggler');
        if (toggler) toggler.setAttribute('aria-expanded', 'false');
      } else {
        siteNav.classList.remove('force-collapse');
      }
    });
  }

  var resizeTimer = null;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(checkNavOverflow, 100);
  });

  // run after a short delay to let fonts/layout settle
  setTimeout(checkNavOverflow, 150);
});
