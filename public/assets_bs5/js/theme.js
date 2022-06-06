$(function () {
	"use strict";

	const ps = new PerfectScrollbar('.main-sidebar');

	var sidebarMenu = $('.sidebar-menu');

	$(document).on('click','.sidebar-toggle',function(event) {
        event.preventDefault();
        if (window.matchMedia('(max-width: 768px)').matches)
        {
            $('body').toggleClass('sidebar-mobile-menu');
        } else {
            $('body').toggleClass('sidebar-close-menu');
		}		
	});

	$(document).on('click','.topnav-toggle',function(event) {
		event.preventDefault();
		if($('#topsearch').hasClass('show')) {
			$('#topsearch').removeClass('show');
		}
		$('#topnav').toggleClass('show');
	});

	$(document).on('click','.topsearch-toggle',function(event) {
        event.preventDefault();
		if($('#topnav').hasClass('show')) {
			$('#topnav').removeClass('show');
		}
		$('#topsearch').toggleClass('show');
	});

	$(document).on('click','.menu-link',function(event) {
		if($(this).parent().hasClass('has-menu')) {
			event.preventDefault();
            $(this).parent().toggleClass('is-open');
            $(this).parent().siblings().removeClass('is-open');
		}		
    });
    	
	$('.sidebar-menu a').each(function() {
	  	var pageUrl = window.location.href.split(/[?#]/)[0];
		if (pageUrl.startsWith(this.href)) { 
			$(this).parents('.menu-item').addClass('is-active');
		}
	});
	
	var toggleSidebar = function() {
		if (window.matchMedia('(max-width: 768px)').matches)
        {
			if ($('body').hasClass('sidebar-close-menu')) {
				$('body').removeClass('sidebar-close-menu');
			}
        } else {
			if ($('body').hasClass('sidebar-mobile-menu')) {
				$('body').removeClass('sidebar-mobile-menu');
			}
		}
	}

	toggleSidebar();

	$(window).on('resize',toggleSidebar);

	$("[data-bs-toggle='slide']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-bs-toggle='slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});
	
	$("[data-bs-toggle='sub-slide']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-bs-toggle='sub-slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
		$('.slide.active').addClass('is-expanded');
	});
	
	$("[data-bs-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');
	$("[data-bs-toggle='sub-slide.'].is-expanded").parent().toggleClass('is-expanded');
	
	$("[data-bs-toggle='tooltip']").tooltip();
	
});