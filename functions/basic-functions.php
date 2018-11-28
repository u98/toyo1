<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */
// Testimonial Style 1 Function 

function carforyou_testimonial($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="row">
        <div id="testimonial-slider">
            <div class="owl-carousel">
                <?php $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish', 'posts_per_page'=>$show,) ); ?>
                <?php while ($loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="testimonial-m">
                            <div class="testimonial-img">
                                <?php the_post_thumbnail('carforyou_small');?>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-heading">
                                    <h5><?php the_title(); ?></h5>
                                    <span class="client-designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span>
                                </div>
                               <?php the_excerpt(); ?>
                            </div>
                        </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>    
    </div>
<?php 
}
// Testimonial Style 2 Function
function carforyou_testimonial_2($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div id="testimonial-slider-2">
        <div class="owl-carousel">
          <?php  $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish','posts_per_page'=>$show,) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
               <div class="testimonial_wrap">
                   <div class="testimonial-img">
                      <?php the_post_thumbnail('carforyou_small');?>
                   </div>
                   <div class="testimonial-heading">
                      <h5><?php the_title(); ?></h5>
                      <span class="client-designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span> 
                   </div>
                   <p><?php the_excerpt(); ?></p>
               </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>  
    </div>
<?php } 

// Latest Post Blog
function carforyou_Latestblog($atts){ 
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<?php $loop = new WP_Query( array('post_type' => 'post', 'post_status' =>' publish', 'posts_per_page'=>$show,));
while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="col-md-4 col-sm-4">
        <article class="blog-list">
          <div class="blog-info-box"> 
          <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail() ):
               the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                else:
                echo "<div class='is-empty-img-box'></div>";
                endif;
              ?>
              </a>
            <ul>
             
              <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php the_time('d M Y') ?></a></li>
              <li><a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo get_comments_number(); ?><?php esc_html_e(' Comments', 'carforyou'); ?></a></li>
            </ul>
          </div>
          <div class="blog-content">
            <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-link"><?php esc_html_e('Read More','carforyou'); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
<?php endwhile; wp_reset_query();
}

// Trending Car List 
function carforyou_trendcar($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="col-lg-12">
            <div id="trending_slider">
                <div class="owl-carousel">
                    <?php $args = array('post_type' => 'post','posts_per_page'=>$show, 'meta_key' => 'meta-checkbox', 'meta_value' => 'yes');
                    $trending = new WP_Query($args);
                    if ($trending->have_posts()): while($trending->have_posts()): $trending->the_post(); ?>
                        <div class="trending-car-m">
                        <div class="trending-car-img">
                         <?php if (has_post_thumbnail() ):
                           the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                            else:
                            echo "<div class='is-empty-img-box'></div>";
                            endif;
                          ?>
                        </div>
                        <div class="trending-hover">
                          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                        </div>
                    <?php  endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
          </div>
<?php }

// Team Member Function
function carforyou_team($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="row">
    <?php $loop = new WP_Query( array('post_type' => 'team', 'post_status' => 'publish', 'posts_per_page'=>$show,)); 
          global $post;
    	  while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="col-md-4 col-sm-4">
            <div class="team_member">
                <div class="team_img">
                    <?php the_post_thumbnail('carforyou_small');?>
                    <div class="team_more_info">
                        <div class="info_wrap">
                        <?php if(!empty($post->auto_member_phone)): echo '<p><span>'.esc_html('Phone:', 'carforyou').'</span> <a href="tel:'.esc_html($post->auto_member_phone).'">'.esc_html($post->auto_member_phone).'</a></p>'; endif; ?>                <?php if(!empty($post->auto_member_email)): echo '<p><span>Email:</span> <a href="mailto:'.esc_html($post->auto_member_email).'">'.esc_html($post->auto_member_email).'</a></p>'; endif; ?>                
                            <ul>
                            <?php 
                            if(!empty($post->auto_member_fb)): echo '<li><a href="'.esc_url($post->auto_member_fb).'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_tw)): echo '<li><a href="'.esc_url($post->auto_member_tw).'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_link)): echo '<li><a href="'.esc_url($post->auto_member_link).'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_google)): echo '<li><a href="'.esc_url($post->auto_member_google).'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>'; endif; 
                            ?>
                            </ul>
                        </div>
                    </div>                
                </div>
                <div class="team_info">
                    <h6><?php the_title(); ?></h6>
                    <?php if(!empty($post->auto_member_designation)): echo '<p>'.esc_html($post->auto_member_designation).'</p>';endif;?>
                </div>        
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>
<?php }  
// UseNewCar Function
function carforyou_UseNewCar($atts){
ob_start();	
extract( shortcode_atts(array('show' =>''), $atts ));
$optKmMiles= carforyou_get_option('optKmMiles');
if($optKmMiles=='2'):
	$KmMiles=" Miles";
else:
	$KmMiles=" km";
endif;                  


?>
        <div class="row">
            <div class="recent-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resentnewcar" aria-controls="usedcar" role="tab" data-toggle="tab"><?php esc_html_e('New Car','carforyou') ?></a></li>
                    <li role="presentation"><a href="#resentusecar" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Use Car','carforyou') ?></a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="resentnewcar">
                    <?php  
                    $loop = new WP_Query(array('post_type' => 'auto', 'post_status' =>'publish', 'posts_per_page'=>$show, 'meta_key' =>'DREAM_auto_condition', 'meta_value' =>'new')); 
                    while ($loop->have_posts()) : $loop->the_post();
                    global $post; ?>
                        <div class="col-list-3">	
                            <div class="recent-car-list">
                                 <div class="car-info-box">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail() ):
                                                the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                                                else:
                                                echo "<div class='is-empty-img-box'></div>";
                                                endif;
                                         ?>
                                    </a> 
                                    <div class="compare_item">
                                        <div class="checkbox">
                                        <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>
                                    </div>
                                    </div>
                                    <ul>
                                    <?php 
                                        $km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
                                        if(!empty($km_done)): 
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).' '.$KmMiles.'</li>';
                                                        else:
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>';
                                        endif;
                                        $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                        $year_model = $term_single->name;
                                            if(!empty($year_model)): 
                                                echo '<li><i class="fa fa-calendar" aria-hidden="true"></i>'.esc_html($year_model).' Model</li>';
                                            endif;
                                        $term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                            $location = $term_single->name;
                                            if(!empty($location)):
                                                echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i>'.esc_html($location).'</li>';
                                            endif; 
                                    ?>
                                    </ul>  
                                  </div>  
                                 <div class="car-title-m">
                                    <h6><a href="<?php the_permalink();?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 28, '...'); ?> </a></h6>
                                     <?php  if(!empty($post->DREAM_auto_price)): ?>
                                        <span class="price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span>
                                     <?php endif; ?>
                                 </div> 
                                 <div class="inventory_info_m">
                                 	<p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
                                 </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
               </div>
               <!-- Recently Listed Used Cars -->
                <div role="tabpanel" class="tab-pane" id="resentusecar">
                <?php $loop = new WP_Query( array('post_type' => 'auto', 'post_status' =>' publish','posts_per_page'=>$show, 'meta_key' => 'DREAM_auto_condition', 'meta_value' => 'used'))?>
                <?php while ($loop->have_posts()) : $loop->the_post();?>
                    <div class="col-list-3">	
                        <div class="recent-car-list">
                             <div class="car-info-box">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail() ):
                                            the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                                            else:
                                            echo "<div class='is-empty-img-box'></div>";
                                            endif;
                                     ?>
                                </a> 
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>
                                    </div>
                                </div>
                                <ul>
                                
                                
                                        <?php 
                                        $km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
                                        if(!empty($km_done)): 
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).' '.$KmMiles.'</li>';
                                                        else:
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>';
                                        endif;
                                    
                                     $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                        $year_model = $term_single->name;
                                            if(!empty($year_model)): 
                                                echo '<li><i class="fa fa-calendar" aria-hidden="true"></i>'.esc_html($year_model).' Model</li>';
                                            endif;
                                            
                                            
                                    $term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                            $location = $term_single->name;
                                            if(!empty($location)):
                                                echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i>'.esc_html($location).'</li>';
                                            endif; 
                                    ?>
                                    </ul>   
                              </div>  
                             <div class="car-title-m">
                                    <h6><a href="<?php the_permalink();?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 28, '...'); ?> </a></h6>
                                    <?php  if(!empty($post->DREAM_auto_price)): ?>
                                    <span class="price"><?php carforyou_curcy_prefix(); ?> <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span>
                                    <?php endif; ?>
                            </div>
                             <div class="inventory_info_m">
                                 	<p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
                             </div>
                        </div>
                    </div>
                 <?php endwhile; wp_reset_query(); ?>   
                </div>
           </div>     
        </div>
<?php } 

// FeaturedCar Function 
function carforyou_FeaturedCar($atts){
ob_start();?>
<div class="row">
	<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'auto', 'posts_per_page'=>$show, 'post_status' =>' publish',
	'meta_query' => array(
        array(
            'key' => 'DREAM_featured_auto',
            'value' =>'yes',
        ))));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; ?>
        <div class="col-list-3">
          <div class="featured-car-list">
                <div class="featured-car-img">
                    <a href="<?php the_permalink();?>">
                        <?php if(has_post_thumbnail()):
                                the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                                else:
                                echo "<div class='is-empty-img-box'></div>";
                                endif;
                         ?>
                    </a>
                    <?php carforyou_AutoType(); ?>
                    <div class="compare_item">
                            <div class="checkbox">
                                <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>
                            </div>
                        </div>
                 </div>
                <div class="featured-car-content">
                    <h6><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?></a></h6>
                    <div class="price_info">
                        <?php  if(!empty($post->DREAM_auto_price)): ?>
                        <p class="featured-price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
                        <?php endif; ?>
                        <div class="car-location">
                        <?php $term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                                foreach($term_list as $term_single) 
                                    $location = $term_single->name;
                        ?>
                        <?php  if(!empty($location)): ?>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($location); ?> </span>
                        <?php endif; ?>
                        </div>
                    </div>
                    <ul>
                        <?php carforyou_featuredList(); ?> 
                    </ul>
                </div>
          </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
<?php }

// Currency Symbols
function carforyou_curcy_prefix(){
$curcy_symbol = carforyou_get_option('currency_symbols');
	echo esc_html($curcy_symbol);
}
