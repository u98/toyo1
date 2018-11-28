<?php 
/**
 * Footer template for our theme
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 1.0
 */ 

carforyou_populerbrand(); 
?>
<!--Footer -->
<?php carforyou_footer(); ?>
<!-- /Footer--> 
<!--Back to top-->
<?php $back_to_home = carforyou_get_option('footer_botton_back_to_top');  
if($back_to_home=='1'|| $back_to_home==''): ?>
<div id="back-top" class="back-top"> 
	<a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> 
</div>
<?php endif; ?>
<!--/Back to top--> 
<div style="display:none;">
    <div id="siderwidth1"></div>
    <div id="siderwidth2"></div>
    <div id="siderwidth3"></div>
    <div id="siderwidth4"></div>
    <div id="siderwidth5"></div>
    <div id="siderwidth6"></div>
</div>
<?php carforyou_footer_bottom(); ?>
<?php  wp_footer(); ?>
<!-- UCHINKA CUSTOM HERE -->
<script>
	$('.chk_color_box .list-color > ul > li span').click(e => {
		let ele = e.target;
		let cl = ele.getAttribute('data-cl');
		let img = ele.getAttribute('data-img');
		let price = ele.getAttribute('data-price')
		$('.chk_color_box .img_box > img.lazy')[0].src = img;
		$('.chk_color_box .list-color .txt-color').text(cl);
	})
</script>
</body>
</html>