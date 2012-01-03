<?php

function twentyten_setup()
{
  
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'link' , 'gallery') );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

}

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
		'align'	=> 'aligncenter',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( empty($caption) )
		return $content;
  
	if ( $id != '' ) $id = 'id="' . esc_attr($id) . '" ';
  
  if ( 50 < (int) $width ) {
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
  } else {
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
  }
  
}

add_filter('img_caption_shortcode','img_shortcode_arudy',10,3);

remove_action( 'init', 'ilap_create_instapaper_type' );

?>