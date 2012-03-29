// 
//  hideshow-social.js
//  alexrudy
//  
//  Created by Alexander Rudy on 2012-03-29.
//  Copyright 2012 Alexander Rudy. All rights reserved.
// 

(function($) {
	$('#social').before('<a href="#comments-toggle" id="comments-toggle">Show Comments</a>');
	jQuery('#social').hide('slow');
	jQuery('#comments-toggle').click(function(){
		jQuery('#comments-toggle').hide();
		jQuery('#social').show(1000);
	});
})(jQuery);