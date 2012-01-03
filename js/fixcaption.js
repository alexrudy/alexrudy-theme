// 
//  fixcaption.js
//  MTSYNC
//  
//  Created by Alexander Rudy on 2011-07-17.
//  Copyright 2011 Alexander Rudy. All rights reserved.
// 

function set_caption_width () {
	jQuery('.wp-caption').each(function(index,element){
		
		// Remove p tags which end up around iframe objects
		tag = jQuery(this).find('iframe').prev('p')
		if (tag.is(':empty')) {
			tag.remove();
		}
		tag = jQuery(this).find('iframe').next('p')
		if (tag.is(':empty')) {
			tag.remove();
		}
		
		
		// Fix Width Problems
		var width = jQuery(this).find('img').outerWidth();
		width = width || jQuery(this).find('iframe').outerWidth()
		if (width > 50) {
			jQuery(this).css('width',width+10);
		} else {
			var width = jQuery(this).children().outerWidth();
			if (width > 50 ) { jQuery(this).css('width',width+10); };
		};
	});
}

jQuery(window).load(function(){set_caption_width();});
jQuery(document).ready(function(){set_caption_width();});