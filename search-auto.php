<?php
/**
 *Template Name: Search Auto
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
carforyou_inner_header();
if(isset($_REQUEST['searchauto'])){
$location_enalble = carforyou_get_option('location_enalble');
if($location_enalble=='1'|| $location_enalble==''):	
	$location = $_REQUEST['location'];
else:
$location='';	
endif;	
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''):	
	$autobrand = $_REQUEST['autobrand'];
	$automodel = $_REQUEST['automodel'];
else:
$autobrand='';	
$automodel='';	
endif;
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''):	
	$modelyear = $_REQUEST['modelyear'];
else:
$modelyear='';	
endif;	
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):	
	$priceRange = $_REQUEST['priceRange'];
	$price1= explode(',',$priceRange); 
	$min_price= $price1['0'];
	$max_price =$price1['1'];
else:
$priceRange='';	
$min_price='';
$max_price='';
endif;	
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):	
	$autotype = $_REQUEST['autotype'];
else:
$autotype='';	
endif;	
	
	$meta_query='';
	$tax_count='';
	  $tax_query =array();
		if($autobrand){
		  $tax_query[] = array (
			 'taxonomy'  => 'auto-brand',
			 'field'     => 'slug',
			 'terms'     => $autobrand
		 );
		}
		if($location){
		  $tax_query[] = array ( 
			'taxonomy'=>'auto-location',
			 'field'=>'slug',
			 'terms'=>$location );
		}
		if($modelyear){
		  $tax_query[] = array (
			  'taxonomy'  => 'year-model',
			  'field'     => 'slug',
			  'terms'     => $modelyear
		   );
		}
	/* Logic for Auto Condition Parameters */ 
	if((!empty($_GET['automodel'])) && ( $_GET['automodel'] != 'any' ) ){
		$meta_query[] = array(
			'key' => 'DREAM_auto_model',
			'value' => $_GET['automodel'],
			'compare' => '=',
		);
	}	
	/* Logic for Auto Condition Parameters */ 
	if((!empty($_GET['autotype'])) && ( $_GET['autotype'] != 'any' ) ){
		$meta_query[] = array(
			'key' => 'DREAM_auto_condition',
			'value' => $_GET['autotype'],
			'compare' => '=',
		);
	}
	/* Logic for Min and Max Price Parameters */
	if( $min_price >= 0 && $max_price > $min_price ){
	$meta_query[] = array(
		'key' => 'DREAM_auto_price',
		'value' => array( $min_price, $max_price ),
		'type' => 'NUMERIC',
		'compare' => 'BETWEEN'
	);
	}
	if( $tax_count > 1 ){
		$tax_query['relation'] = 'AND';
	}
	if( $tax_count > 0 ){
		$tax_query['tax_query'] = $tax_query;
	}
}
?>
<section class="listing-page">
	<div class="container">
    	<div class="row">
			<?php
            $sidebar = carforyou_get_option('car_listing_sidebar');
            if($sidebar=='car_list_right'):
                $page_grid="col-md-9";
                $side_grid="col-md-3";
            else:
                $page_grid="col-md-9 col-md-push-3";
                $side_grid="col-md-3 col-md-pull-9";
            endif;
			?> 
    		<div class="<?php echo esc_attr($page_grid); ?>">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <p><?php  echo wp_count_posts('auto')->publish; ?> <span> <?php esc_html_e('Listings','carforyou'); ?></span></p>
                     </div>  
                     <?php carforyou_FilterbyOrder(); ?>
                </div>
                <div class="row">
			  <?php 
			  if(isset($_REQUEST['vehicle_order'])):
                    global $post;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $price_order= $_REQUEST['vehicle_order'];	
                    if($price_order=='price_low'):		
                     $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'paged' =>$paged);	
                    elseif($price_order=='price_high'):
                     $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' =>$paged);	
                    elseif($price_order=='newItem'):
                      $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'DESC', 'paged' =>$paged);	
                    else:
                      $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'ASC', 'paged' =>$paged);	
                    endif;
                    $wp_query = new WP_Query($args);
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    	carforyou_search_style();    
                    endwhile; 
                    carforyou_pagination(); 	 
					elseif(isset($_REQUEST['searchauto'])):
					global $post;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('post_type' => 'auto', 'tax_query' => $tax_query, 'meta_query' =>$meta_query, 'compare' => 'LIKE','paged' =>$paged);
					$wp_query = new WP_Query($args);
					while ( $wp_query ->have_posts() ) : $wp_query ->the_post();
						carforyou_search_style();
					endwhile;
				    carforyou_pagination(); 
					else:
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'auto','paged' =>$paged);
					$my_query1  = new WP_Query( $args );
					while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post();
						carforyou_search_style();
					endwhile;
						carforyou_pagination(); 
					endif;
					?>
              </div>
        </div>
            <aside class="<?php echo esc_attr($side_grid); ?>">
				<?php carforyou_listpagesidebar(); ?>
           </aside>	
        </div>
    </div>
</section>
<?php get_footer();?>