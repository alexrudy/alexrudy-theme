// 
//  fixcaption.js
//  MTSYNC
//  
//  Created by Alexander Rudy on 2011-07-17.
//  Copyright 2011 Alexander Rudy. All rights reserved.
// 

function set_caption_width () {
	jQuery('.wp-caption').each(function(index,element){
		var width = jQuery(this).children().children().outerWidth();
		if (width > 50) {
			jQuery(this).css('width',width+10);
		} else {
			var boxWidth = jQuery(this).children().outerWidth();
			if (boxWidth > 50 ) {
				jQuery(this).css('width',boxWidth+10)
			};
		};
	});
}

jQuery(window).load(function(){set_caption_width();});
jQuery(document).ready(function(){set_caption_width();});