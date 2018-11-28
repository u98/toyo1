<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php

if (!function_exists('wp_site_icon')|| ! wp_site_icon()):

  $favicon = carforyou_get_option('site_favicon');

   if (!empty($favicon['url'])):

  echo '<link rel="shortcut icon" href="'.esc_url($favicon['url']).'" type="image/x-icon">';

  endif;

endif;
/* Always have wp_head() just before the closing </head>

 * tag of your theme, or you will break many plugins, which

 * generally use this hook to add elements to <head> such

 * as styles, scripts, and meta tags.

 */
wp_head();
?>
</head>
<?php 
if (function_exists('carforyou_pc')):
	carforyou_pc();
endif;
if(function_exists('carforyou_font_family')):
	carforyou_font_family();
endif;
?>
<body <?php body_class(); ?> >


<?php carforyou_header(); ?>


