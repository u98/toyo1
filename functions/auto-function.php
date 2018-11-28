<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */
 // Populer Brand
function carforyou_populerbrand(){
$footer_brand = carforyou_get_option('footer_brand'); 
if($footer_brand=='1'): ?>
<section class="brand-section gray-bg">
  <div class="container">
    <?php $brand_text = carforyou_get_option('brand_text');
			if(!empty($brand_text)) : ?>
    <div class="brand-hadding">
      <h5>
        <?php  echo esc_html($brand_text);?>
      </h5>
    </div>
    <?php endif; ?>
    <div class="brand-logo-list">
      <div id="popular_brands">
        <div class="owl-carousel">
          <?php 
		  $brandpages = carforyou_get_option('footer_brand_limit');
		  $loop = new WP_Query( array('post_type' => 'brand', 'post_status' =>' publish', 'order'  => 'ASC', 'posts_per_page' => esc_html($brandpages)))?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <div>
            <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php echo esc_url( get_post_meta(get_the_ID(), 'auto_brand_link', true)); ?>" target="_blank">
            <?php the_post_thumbnail('carforyou_small', array('class' => 'img-responsive')); ?>
            </a>
            <?php endif; ?>
          </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif;
}

// Compare Form
function carforyou_Compare_Form(){ ?>
<div id="add_model_compare">
  <form id="productCompareForm" method="post" action="<?php echo esc_url(get_permalink(carforyou_get_option('compared_pagelink'))); ?>" enctype="multipart/form-data">
    <h2>
      <?php esc_html_e('Compared Auto','carforyou'); ?>
      <span>(<span id="countProduct">0</span>)</span><span class="compare-close"><a onclick="javascript:closePopUp();"> × </a></span></h2>
    <ul>
      <li class="vs_model"><a href="#"><img id="pro_img_1" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="" class="img-responsive"></a></li>
      <li class="vs_model"><a href="#"><img id="pro_img_2" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="" class="img-responsive"></a></li>
      <li><a href="#"><img id="pro_img_3" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="" class="img-responsive"></a></li>
    </ul>
    <a onclick="javascript:formSubmit();" class="compare_now_btn">
    <?php esc_html_e('Compare','carforyou'); ?>
    </a>
    <div class="hidden">
      <input id="p1" name="p1" value=""/>
      <input id="p2" name="p2" value=""/>
      <input id="p3" name="p3" value=""/>
    </div>
  </form>
</div>
<?php }
function carforyou_footer_bottom(){
	//Auto Compare Form
	if (function_exists('carforyou_Compare_Form')):
		carforyou_Compare_Form();
	endif;
	//Auto Brand Ajax Filter
	if (function_exists('carforyou_Brand_Filter')):
		carforyou_Brand_Filter();
	endif;
	//Auto Compare Popup Ajax
	if (function_exists('carforyou_Compare_PopupAjax')):
		carforyou_Compare_PopupAjax();
	endif;
}
function carforyou_FilterbyOrder(){ 
$vehicle_order='';
if(isset($_REQUEST['vehicle_order'])):	
	$vehicle_order = $_REQUEST['vehicle_order'];
endif;
?>
<div class="result-sorting-by">
  <p>
    <?php esc_html_e('Sort by:','carforyou'); ?>
  </p>
  <form action="" method="get" id="ShortOrder">
    <div class="form-group select sorting-select">
      <select id="auto_price_list" class="form-control" name="vehicle_order">
        <option value="">
        <?php esc_html_e('Sort Listing','carforyou'); ?>
        </option>
        <option value="price_low" <?php if($vehicle_order=="price_low"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Price (Low to High)','carforyou'); ?>
        </option>
        <option value="price_high" <?php if($vehicle_order=="price_high"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Price (High to Low)','carforyou'); ?>
        </option>
        <option value="newItem" <?php if($vehicle_order=="newItem"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Newest Items','carforyou'); ?>
        </option>
        <option value="oldItem" <?php if($vehicle_order=="oldItem"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Oldest Items','carforyou'); ?>
        </option>
      </select>
    </div>
  </form>
</div>
<?php }                 
