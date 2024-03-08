(function( $ ) {
	'use strict';

	/*================
	 Mobile Menu
	==================*/

	$('.menu-toggle').click(function(){
		$('.menu-content').slideToggle();
	});

	$('.menu-item-has-children a i').click(function(e){
		e.preventDefault();
		$(this).parents('a').siblings('.sub-menu').slideToggle();
	});

	/*================
	 Search Popup
	==================*/

	if($('.search-icon').length) {
		$('.search-icon').on('click', function() {
			$('body').addClass('search-active');
		});
		$('.search-close').on('click', function() {
			$('body').removeClass('search-active');
		});
	}

	/*================
	 Preloader
	==================*/
	
	window.onload = function(){
		$("#preloader").hide();
	}
	
	/*================
	 Scroll to Top
	==================*/

	if($('.scroll-up path').length){
		var progressPath = document.querySelector('.scroll-up path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		};
		updateProgress();
		$(window).on('scroll', updateProgress);
		var offset = 250;
		var duration = 550;
		jQuery(window).on('scroll', function () {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.scroll-up').addClass('active-progress');
			} else {
				jQuery('.scroll-up').removeClass('active-progress');
			}
		});
		jQuery('.scroll-up').on('click', function (event) {
			event.preventDefault();
			jQuery('html, body').animate({ scrollTop: 0 }, duration);
			return false;
		});
	}


})( jQuery );