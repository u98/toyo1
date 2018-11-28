<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */
 // Banner Slider
function carforyou_Slider(){
ob_start();	?>
<section id="banner2">
	<div class="owl-carousel owl-theme">
		<?php 
        $slides = carforyou_get_option('home_slider');
        $i=1;       
        foreach ($slides as $slide):?>
          <div class="slides" id="siderwidth<?php echo $i;?>" style="background-image:url(<?php echo $slide['image']?>);">
              <div class="carousel-caption">
                    <div class="banner_text text-center div_zindex white-text">
                    <?php 
                    echo "<h1>".$slide['title']."</h1>";
                    echo "<h3>".$slide['description']."</h3>";
                    if (!empty($slide['url'])){?>
                            <a href="<?php echo $slide['url'] ?>" class="btn"><?php echo carforyou_get_option('read_more_btn')?></a>
                    <?php } ?> 
                 </div>
              </div>
          </div>
        <?php $i++; endforeach; ?>         
    </div>
</section>
<?php
$output = ob_get_clean();
return $output; 
}