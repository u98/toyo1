<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */
// Filter Form  Style 1
function carforyouFilterForm(){
ob_start();			
$location ='';$brand ='';$modelyear ='';?>
<form action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php $location_enalble = carforyou_get_option('location_enalble');
if($location_enalble=='1'|| $location_enalble==''): ?>
  <div class="form-group col-md-3 black_input">
    <div class="select">
      <select name="location" class="form-control">
        <option value="">
        <?php esc_html_e('Select Location','carforyou'); ?>
        </option>
        <?php if($location){ ?>
        <option value="<?php echo esc_attr($location); ?>"><?php echo esc_html($location); ?></option>
        <?php }
			$taxonomy = 'auto-location';
			$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term){
				echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
			}
			?>
      </select>
    </div>
  </div>
<?php endif;
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group col-md-3 black_input">
    <div class="select">
      <select name="autobrand" class="form-control" id="autobrand">
        <option value="">
        <?php esc_html_e('Select Brand','carforyou'); ?>
        </option>
        <?php if($brand){ ?>
        <option value="<?php echo esc_attr($brand); ?>"><?php echo esc_html($brand); ?></option>
        <?php }
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term) {
			echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
		}?>
      </select>
    </div>
  </div>
  <div class="form-group col-md-3 black_input">
    <div class="select">
      <select name="automodel" class="form-control" id="automodel" >
        <option value="">
        <?php esc_html_e('Select Brand First','carforyou'); ?>
        </option>
      </select>
    </div>
  </div>
<?php endif; 
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''): ?>
  <div class="form-group col-md-3 black_input">
    <div class="select">
      <select class="form-control" name="modelyear">
        <option value="">
        <?php esc_html_e('Year of Model','carforyou'); ?>
        </option>
        <?php if($modelyear){ ?>
        <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear); ?></option>
        <?php }
			$taxonomy = 'year-model';
			$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term) {
				echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
			}
			?>
      </select>
    </div>
  </div>
<?php endif;
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>  
  <div class="form-group col-md-6 col-sm-6 black_input">
    <label class="form-label">
      <?php esc_html_e('Price Range ','carforyou');?>(<?php carforyou_curcy_prefix(); ?>)
    </label>
    <input id="price_range" name="priceRange" type="text" class="span2" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif;
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):?>
  <div class="form-group col-md-3 black_input">
    <div class="select">
      <select class="form-control" name="autotype">
        <option value=""><?php echo esc_html('Type of Car','carforyou'); ?></option>
        <option value="<?php echo esc_attr('new'); ?>">
        <?php esc_html_e('New Car','carforyou'); ?>
        </option>
        <option value="<?php echo esc_attr('used'); ?>">
        <?php esc_html_e('Used Car','carforyou'); ?>
        </option>
      </select>
    </div>
  </div>
<?php endif; ?>  
  <div class="form-group col-md-3">
    <button type="submit" class="btn btn-block" name="searchauto"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
</form>
<?php 
} 
// Filter Form  Style 2
function carforyou_FilterForm2(){
ob_start();	
$location ='';$brand ='';$modelyear =''; ?>
<div class="container">
  <div id="filter_form2">
    <div class="main_bg white-text">
      <?php $serch_filter = carforyou_get_option('serch_filter');
                if(!empty($serch_filter)) : ?>
      <h3><?php echo wp_kses_post($serch_filter); ?></h3>
      <?php endif; ?>
      <div class="row">
        <form action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
		<?php $location_enalble = carforyou_get_option('location_enalble');
        if($location_enalble=='1'|| $location_enalble==''): ?>
          <div class="form-group col-md-3">
            <div class="select">
              <select name="location" class="form-control">
                <option value="">
                <?php esc_html_e('Select Location','carforyou'); ?>
                </option>
                <?php if($location){ ?>
                <option value="<?php echo esc_attr($location); ?>"><?php echo esc_html($location); ?></option>
                <?php }
					$taxonomy = 'auto-location';
					$tax_terms = get_terms($taxonomy);
					foreach ($tax_terms as $tax_term){
						echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
					}
				?>
              </select>
            </div>
          </div>
		<?php endif; 
		$brand_enalble = carforyou_get_option('brand_enalble');
		if($brand_enalble=='1'|| $brand_enalble==''): ?>
          <div class="form-group col-md-3">
            <div class="select">
              <select name="autobrand" class="form-control" id="autobrand">
                <option value="">
                <?php esc_html_e('Select Brand','carforyou'); ?>
                </option>
                <?php if($brand){ ?>
                <option value="<?php echo $brand; ?>"><?php echo esc_html($brand); ?></option>
                <?php }
				$taxonomy = 'auto-brand';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) {
					echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
				}?>
              </select>
            </div>
          </div>
          <div class="form-group col-md-3">
            <div class="select">
              <select name="automodel" class="form-control" id="automodel" >
                <option value="">
                <?php esc_html_e('Select Brand First','carforyou'); ?>
                </option>
              </select>
            </div>
          </div>
		<?php endif;
		$year_enalble = carforyou_get_option('year_enalble');
		if($year_enalble=='1'|| $year_enalble==''): ?>
          <div class="form-group col-md-3">
            <div class="select">
              <select class="form-control" name="modelyear">
                <option value="">
                <?php esc_html_e('Year of Model','carforyou'); ?>
                </option>
                <?php if($modelyear){ ?>
                <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear); ?></option>
                <?php }
				$taxonomy = 'year-model';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) {
					echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
				}
				?>
              </select>
            </div>
          </div>
        <?php endif;
        $price_enalble = carforyou_get_option('price_enalble');
		if($price_enalble=='1'|| $price_enalble==''):?> 
          <div class="form-group col-md-6 col-sm-6">
            <label class="form-label">
              <?php esc_html_e('Price Range ','carforyou');?>(<?php carforyou_curcy_prefix(); ?>)
            </label>
            <input id="price_range" name="priceRange" type="text" class="span2" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
          </div>
       <?php endif; 
		$type_enalble = carforyou_get_option('type_enalble');
		if($type_enalble=='1'|| $type_enalble==''):?>
          <div class="form-group col-md-3">
            <div class="select">
              <select class="form-control" name="autotype">
                <option value="">
                <?php esc_html_e('Type of Car','carforyou'); ?>
                </option>
                <option value="<?php echo esc_attr('new'); ?>">
                <?php esc_html_e('New Car','carforyou'); ?>
                </option>
                <option value="<?php echo esc_attr('used'); ?>">
                <?php esc_html_e('Used Car','carforyou'); ?>
                </option>
              </select>
            </div>
          </div>
        <?php endif; ?>  
          <div class="form-group col-md-3">
            <button type="submit" class="btn btn-block" name="searchauto"><i class="fa fa-search" aria-hidden="true"></i>
            <?php esc_html_e('Search Car','carforyou'); ?>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
} 
// Sidebar Filter Form
function carforyou_sidebar_filter(){
ob_start();		
$location ='';$automodel ='';$modelyear ='';$brand ='';$autotype ='';
if(isset($_REQUEST['searchauto'])):	
	$location_enalble = carforyou_get_option('location_enalble');
	if($location_enalble=='1'|| $location_enalble==''): 
		$location = $_REQUEST['location'];
	endif;
	$brand_enalble = carforyou_get_option('brand_enalble');
	if($brand_enalble=='1'|| $brand_enalble==''):
		$brand = $_REQUEST['autobrand'];
		$automodel = $_REQUEST['automodel'];
	endif;
	$year_enalble = carforyou_get_option('year_enalble');
	if($year_enalble=='1'|| $year_enalble==''):
		$modelyear = $_REQUEST['modelyear'];
	endif;	
	$type_enalble = carforyou_get_option('type_enalble');
	if($type_enalble=='1'|| $type_enalble==''):
		$autotype = $_REQUEST['autotype'];	
	endif;	
endif;
?>
<form action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php
$location_enalble = carforyou_get_option('location_enalble');
if($location_enalble=='1'|| $location_enalble==''):?>
  <div class="form-group select">
    <select name="location" class="form-control">
      <option value=""<?php if($location):?> selected="selected" <?php endif; ?>>
      <?php esc_html_e('Select Location','carforyou'); ?>
      </option>
      <?php
		$taxonomy = 'auto-location';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term):?>
      <option value="<?php echo esc_attr($tax_term->slug); ?>" <?php if($location):?> selected="selected" <?php endif; ?>><?php echo esc_html($tax_term->name); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
<?php endif; 
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group select">
    <select name="autobrand" class="form-control" id="autobrand">
      <option value="">
      <?php esc_html_e('Select Brand','carforyou'); ?>
      </option>
      <?php
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term):?>
      <option value="<?php echo esc_attr($tax_term->slug); ?>" <?php if($brand):?> selected="selected" <?php endif; ?>><?php echo esc_html($tax_term->name); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group select">
    <select name="automodel" class="form-control" id="automodel" >
      <option value="" <?php if($automodel):?> selected="selected" <?php endif; ?>>
      <?php esc_html_e('Select Brand First','carforyou'); ?>
      </option>
    </select>
  </div>
<?php endif;
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''):?>
  <div class="form-group select">
    <select class="form-control" name="modelyear">
      <option value="">
      <?php esc_html_e('Year of Model','carforyou'); ?>
      </option>
      <?php if($modelyear){ ?>
      <option value="<?php echo $modelyear; ?>" <?php if($modelyear):?> selected="selected" <?php endif; ?>><?php echo esc_html($modelyear); ?></option>
      <?php }
		$taxonomy = 'year-model';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term) {
			echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
		}
		?>
    </select>
  </div>
<?php endif;
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>
  <div class="form-group">
    <label class="form-label">
      <?php esc_html_e('Price Range','carforyou');?>
      (
      <?php carforyou_curcy_prefix(); ?>
      ) </label>
    <input id="price_range" name="priceRange" type="text" class="span2" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif;
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):?>
  <div class="form-group select">
    <select class="form-control" name="autotype">
      <option value=""><?php echo esc_html('Type of Car','carforyou'); ?></option>
      <option value="<?php echo esc_attr('new'); ?>" <?php if($autotype=="new"):?> selected="selected" <?php endif; ?>>
      <?php esc_html_e('New Car','carforyou'); ?>
      </option>
      <option value="<?php echo esc_attr('used'); ?>" <?php if($autotype=="used"):?> selected="selected" <?php endif; ?>>
      <?php esc_html_e('Used Car','carforyou'); ?>
      </option>
    </select>
  </div>
<?php endif; ?>
  <div class="form-group">
    <button type="submit" name="searchauto" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
</form>
<?php 
}
// Min Price
function carforyou_min_meta_value(){
	if (function_exists('carforyou_min_price')):
		carforyou_min_price();
	endif;
}
// Max Price
function carforyou_max_meta_value(){
	if (function_exists('carforyou_max_price')):
		carforyou_max_price();
	endif;
}
