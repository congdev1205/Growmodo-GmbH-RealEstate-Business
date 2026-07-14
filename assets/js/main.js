document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.mobile-nav-toggle');
  const nav = document.querySelector('.primary-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen);
    });
  }

  const announcementBar = document.querySelector('.announcement-bar');
  const announcementClose = document.querySelector('.announcement-close');

  if (announcementBar && announcementClose) {
    announcementClose.addEventListener('click', function () {
      announcementBar.style.display = 'none';
    });
  }

  initCarousels();
});

/**
 * Simple, generic carousel controller with a slide+fade transition.
 *
 * Markup contract:
 *   <div data-carousel>
 *     <div class="...-grid" data-carousel-track>
 *       <div>card 1</div>
 *       <div>card 2</div>
 *       ...
 *     </div>
 *     <div class="carousel-controls">
 *       <span data-carousel-count>01 of 03</span>
 *       <button data-carousel-prev>...</button>
 *       <button data-carousel-next>...</button>
 *     </div>
 *   </div>
 *
 * Items-per-page is read live from the track's CSS grid-template-columns,
 * so it automatically matches whatever the current breakpoint's CSS says
 * (3 columns on desktop, 2 on laptop, 1 on mobile, etc) with no extra config.
 * Navigation wraps around (cyclic) — that's all "simple" needs. The actual
 * transition (opacity + a small horizontal shift) is driven by the CSS rule
 * on [data-carousel-track] > * in hero.css; this script just toggles the
 * inline opacity/transform/display values at the right moments.
 */
function initCarousels() {
  var roots = document.querySelectorAll('[data-carousel]');
  var TRANSITION_MS = 300;

  roots.forEach(function (root) {
    var track = root.querySelector('[data-carousel-track]');
    if (!track) return;

    var items = Array.prototype.slice.call(track.children);
    if (items.length === 0) return;

    var countEl = root.querySelector('[data-carousel-count]');
    var prevBtn = root.querySelector('[data-carousel-prev]');
    var nextBtn = root.querySelector('[data-carousel-next]');
    var current = 0;
    var isAnimating = false;

    function getPerPage() {
      var cols = getComputedStyle(track).gridTemplateColumns.split(' ').filter(Boolean).length;
      return Math.max(1, cols || 1);
    }

    function getTotalPages() {
      return Math.max(1, Math.ceil(items.length / getPerPage()));
    }

    function itemsOnPage(page, perPage) {
      return items.filter(function (item, i) {
        return Math.floor(i / perPage) === page;
      });
    }

    function updateCount(totalPages) {
      if (!countEl) return;
      var pad = function (n) { return String(n).padStart(2, '0'); };
      countEl.textContent = pad(current + 1) + ' of ' + pad(totalPages);
    }

    function updateControlsVisibility(totalPages) {
      var controls = root.querySelector('.carousel-controls');
      if (controls) controls.style.display = totalPages <= 1 ? 'none' : '';
    }

    // Instant, no-animation render — used on first load and after a resize.
    function renderInstant() {
      var perPage = getPerPage();
      var totalPages = getTotalPages();
      if (current >= totalPages) current = totalPages - 1;
      if (current < 0) current = 0;

      items.forEach(function (item, i) {
        item.style.display = (Math.floor(i / perPage) === current) ? '' : 'none';
        item.style.opacity = '';
        item.style.transform = '';
      });

      updateCount(totalPages);
      updateControlsVisibility(totalPages);
    }

    // Animated page change — used when the arrows are clicked.
    function goTo(nextIndex, direction) {
      if (isAnimating) return;
      var perPage = getPerPage();
      var totalPages = getTotalPages();
      var target = ((nextIndex % totalPages) + totalPages) % totalPages;
      if (target === current) return;

      isAnimating = true;

      var outItems = itemsOnPage(current, perPage);
      var outShift = direction === 'next' ? '-16px' : '16px';
      var inShift = direction === 'next' ? '16px' : '-16px';

      outItems.forEach(function (item) {
        item.style.opacity = '0';
        item.style.transform = 'translateX(' + outShift + ')';
      });

      setTimeout(function () {
        current = target;
        var inItems = itemsOnPage(current, perPage);

        items.forEach(function (item) { item.style.display = 'none'; });

        inItems.forEach(function (item) {
          item.style.transition = 'none';
          item.style.display = '';
          item.style.opacity = '0';
          item.style.transform = 'translateX(' + inShift + ')';
        });

        // Force a reflow so the "from" state above is committed before
        // switching back to the transitioning state below.
        void track.offsetWidth;

        inItems.forEach(function (item) {
          item.style.transition = '';
          item.style.opacity = '1';
          item.style.transform = 'translateX(0)';
        });

        updateCount(totalPages);
        updateControlsVisibility(totalPages);

        setTimeout(function () { isAnimating = false; }, TRANSITION_MS);
      }, TRANSITION_MS);
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function () { goTo(current - 1, 'prev'); });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', function () { goTo(current + 1, 'next'); });
    }

    renderInstant();

    var resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(renderInstant, 150);
    });
  });
}