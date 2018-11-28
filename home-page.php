<?php
/**
 *Template Name:Home Page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */
/**
Call header using WordPress function  
*/
get_header();
if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
<!-- Banners -->
<div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content(); ?>
  </article>
</div>
<?php  endwhile; endif; 
get_footer();