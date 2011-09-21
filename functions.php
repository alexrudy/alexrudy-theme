<?php


function alexrudyCredit()
{
  ?><a href='http://alexrudy.org/'>Designed by Alexander Rudy</a><?php
}

add_action('twentyten_credits','alexrudyCredit');

function googleAnalytics()
{
  ?><script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-8073855-6']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script><?php
}

add_action('wp_print_footer_scripts','googleAnalytics');

function init_ar_scripts()
{
  wp_enqueue_script( 'fix_caption_width' , content_url('/themes/alexrudy/js/fixcaption.js',__FILE__) , array('jquery') , '1.0');
}

add_action('init','init_ar_scripts');

function img_shortcode_arudy($value, $attr, $content = null)
{
  extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( empty($caption) )
		return $content;
  
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
  
  if ( 50 < (int) $width ) {
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
  } else {
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
  }
  
}

add_filter('img_caption_shortcode','img_shortcode_arudy',10,3);

?>