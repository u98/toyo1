<?php 

/**

 * The Template for displaying all single posts.

 *

 * @package		carforyou

 * @subpackage	Templates

 * @author		wmd team

 * @copyright	Copyright (c) 2017

 * @link		http://www.webmasterdriver.net

 * @since		carforyou 1.0

 */

get_header();

 ?>

<!-- Full faq banner -->

<!--Page Header-->

<!-- /Page Header-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>

<!--Detail Page Content-->

<?php carforyou_detail_page_style(); ?>

<!--Detail Page Content-->

<!--POP Up -->

<?php carforyou_popup(); ?>

<!--POP UP-->

<?php endwhile; endif;?>
<?php get_footer();



