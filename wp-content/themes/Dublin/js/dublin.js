jQuery(document).ready(function() {
	if(jQuery('body').hasClass('home')){
		jQuery('#banner_section').wrap('<div id="banner_container">').before('<div id="banner_nav">')
			.cycle({
				fx: 'fade',
				timeout: 5000,
				pause: 1,
				pager:  '#banner_nav'
			});
		jQuery('#banner_container a[href=#]').live('click', function(e){
			e.preventDefault();
		})
	}
	var heightDiference = jQuery('body').height() - jQuery(window).height();
	if(heightDiference < 0){
		jQuery('#main').height(jQuery('#main').height() - heightDiference);
	}
});