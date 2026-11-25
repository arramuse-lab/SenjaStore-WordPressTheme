/**
 * Senja Store — vanilla JavaScript.
 * Mobile menu, hero keyboard support and product-slider scroll buttons.
 * No jQuery, no third-party libraries.
 */
(function () {
	'use strict';

	// Mobile menu toggle.
	var toggle = document.querySelector('.senja-menu-toggle');
	var nav = document.querySelector('.main-navigation');
	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			var expanded = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			nav.classList.toggle('toggled');
		});
	}

	// Product slider scroll buttons (grid scrolls horizontally on small screens).
	document.querySelectorAll('.senja-slider-wrap').forEach(function (wrap) {
		var grid = wrap.querySelector('.senja-product-grid, ul.products');
		var prev = wrap.querySelector('.senja-slider-btn--prev');
		var next = wrap.querySelector('.senja-slider-btn--next');
		if (!grid) {
			return;
		}
		function scrollByAmount(amount) {
			grid.scrollBy({ left: amount, behavior: 'smooth' });
		}
		if (prev) {
			prev.addEventListener('click', function () { scrollByAmount(-320); });
		}
		if (next) {
			next.addEventListener('click', function () { scrollByAmount(320); });
		}
		// Keyboard arrows move the slider when it has focus.
		grid.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowRight') {
				scrollByAmount(320);
			} else if (event.key === 'ArrowLeft') {
				scrollByAmount(-320);
			}
		});
	});

	// Pause any hero animation on hover or focus (reduced motion friendly).
	var hero = document.querySelector('.senja-hero');
	if (hero) {
		hero.addEventListener('mouseenter', function () {
			hero.classList.add('is-paused');
		});
		hero.addEventListener('mouseleave', function () {
			hero.classList.remove('is-paused');
		});
		hero.addEventListener('focusin', function () {
			hero.classList.add('is-paused');
		});
		hero.addEventListener('focusout', function () {
			hero.classList.remove('is-paused');
		});
	}
})();
