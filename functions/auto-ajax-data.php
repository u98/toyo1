<?php

/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 1.0

 */

function carforyou_selectmodel() {
		if(isset($_POST['autobrandName'])): 
			echo '<option value="">'.esc_html('Select Model','carforyou') .'</option>'; 
			$categorrrr=$_POST['autobrandName'];
			global $dynamitevisuals_my_query ;
			$args = array( 'post_type' => 'auto', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'auto-brand', 'field' => 'slug', 'terms' => $categorrrr) ));                    
			$dynamitevisuals_my_query  = new WP_Query( $args );
			while ( $dynamitevisuals_my_query ->have_posts() ) : $dynamitevisuals_my_query ->the_post();   
			   $auto_model = get_post_meta( get_the_ID(), 'DREAM_auto_model', true );
			   if(!empty($auto_model)):
				   $modal_selects[]='<option value="'.$auto_model.'">'.$auto_model.'</option>';
			   endif;
			endwhile; 	 
			$modal_selects = array_unique($modal_selects);
			sort($modal_selects);
			foreach($modal_selects as $modal_select):
				echo $modal_select;
			endforeach;
		endif;

}
add_action('wp_ajax_SelectModel', 'carforyou_selectmodel');
add_action('wp_ajax_nopriv_SelectModel', 'carforyou_selectmodel');






/*********************** Auto Search Get product for compare ************************************/
add_action('wp_ajax_MyAjaxFunctionCompare', 'carforyou_compareProduct_func');
add_action('wp_ajax_nopriv_MyAjaxFunctionCompare', 'carforyou_compareProduct_func');
 function carforyou_compareProduct_func() {
   if(isset($_POST['productName'])) 
      {  
	   add_filter($_POST['productName'], 'wpse18703_posts_where', 5, 2 );       
	    global $wpdb;		

		$d = array();

 		$args = array(

			"post_type" => "auto",

			);	 

		$query = new WP_Query($args);

		$posts = $query->get_posts();

		foreach($posts as $post)

		{

			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			$d[]= array('id'=>$post->ID,'value'=>$post->post_title,'desc'=>"the write less, do more, JavaScript library",'icon'=>$feat_image);	

		}

		$response = json_encode($d);

 }

 header( "Content-Type: application/json" );

 echo wp_kses_post($response);

exit; }





/*********************** Get Auto 1 for compare ************************************/

add_action('wp_ajax_MyAjaxFunctionProduct_1', 'carforyou_compareAuto1');

add_action('wp_ajax_nopriv_MyAjaxFunctionProduct_1', 'carforyou_compareAuto1');

 function carforyou_compareAuto1()

  {

	 global $wpdb;	 

   if(isset($_POST['productID'])) 

      {

		$productId = $_POST['productID'];

		$myarray = array($productId);

		$args = array( 'post_type' => 'auto', 'post__in' =>$myarray);

		$my_query1  = new WP_Query( $args );

		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post();

			//Product Title 	

			$ProductTitle = the_title();

			//Product Link	

			$ProductLink = get_permalink($post->ID);

			//Product Image 				

			$ProductImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID));	

			//Price 

			$ProductPrice= number_format_i18n(get_post_meta($productId, 'DREAM_auto_price', true));

			//Brand 

			$term_list = wp_get_post_terms($productId,'auto-brand',array('fields'=>'ids'));

			$cat_id = (int)$term_list[0]; 

			$term = get_term_by( 'id', $cat_id, 'auto-brand', 'ARRAY_A' );

			$categoryname = $term['name'];				 				

			//Model 

			$ProductModel= get_post_meta($productId, 'DREAM_auto_model', true );

			//Model Year 

			$year_model_list = wp_get_post_terms($productId,'year-model',array('fields'=>'ids'));

			$year_model_id = (int)$year_model_list[0]; 

			$year_model_term = get_term_by( 'id', $year_model_id, 'auto-brand', 'ARRAY_A' );

			$year_model_name = $year_model_term['name'];

			//Model location 

			$location_list = wp_get_post_terms($productId,'auto-location',array('fields'=>'ids'));

			$location_id = (int)$location_list[0]; 

			$location_term = get_term_by( 'id', $location_id, 'auto-location', 'ARRAY_A' );

			$locationName = $location_term['name'];	

			//Condition  

			$ProductCondition= get_post_meta($productId, 'DREAM_auto_condition', true );

			//KM Done 

			$ProductKmDone= get_post_meta($productId, 'DREAM_auto_km_done', true );

			//Body Color

			$ProductBodyColor= get_post_meta($productId, 'DREAM_auto_body_color', true );

			//Seat Capacity

			$ProductSeatCapacity= get_post_meta($productId, 'DREAM_auto_seat_capacity', true );

			//Transmission

			$ProductTransmission= get_post_meta($productId, 'DREAM_auto_transmission', true );

			//Fuel Type

			$FuelType= get_post_meta($productId, 'DREAM_fuel_type', true );

			//Engine Type

			$EngineType= get_post_meta($productId, 'DREAM_auto_engine_type', true );

			//Engine Description

			$EngineDescription= get_post_meta($productId, 'DREAM_auto_engine_description', true );

			//No Of Cylinders

			$NoCylinder= get_post_meta($productId, 'DREAM_auto_no_of_cylinders', true );

			//Mileage City

			$MileageCity= get_post_meta($productId, 'DREAM_auto_mileage_city', true );

			//Mileage Highway

			$MileageHighway= get_post_meta($productId, 'DREAM_auto_mileage_highway', true );

			//Fuel Tank Capacity

			$FuelTank= get_post_meta($productId, 'DREAM_auto_fuel_tank_capacity', true );

			//No Owner

			$NoOwner= get_post_meta($productId, 'DREAM_auto_no_of_Owners', true );

			

			//Accessories

			if(!empty(get_post_meta($productId, 'DREAM_air_conditioner', true ))):

				$air_conditioner ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$air_conditioner ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_braking_system', true ))):

				$braking_system ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$braking_system ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_steering', true ))):

				$power_steering ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_steering ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_window', true ))):

				$power_window ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_window ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_CD_player', true ))):

				$CD_player ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$CD_player ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_leather_seats', true ))):

				$leather_seats ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$leather_seats ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_central_locking', true ))):

				$central_locking ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$central_locking ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_door_lock', true ))):

				$door_lock ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$door_lock ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			

		endwhile;

	  }

$productHtml=$ProductTitle."#".$ProductPrice."#".$categoryname."#".$postid."#".$ProductModel."#".$year_model_name."#".$locationName."#".$ProductCondition."#".$ProductKmDone."#".$ProductBodyColor."#".$ProductSeatCapacity."#".$ProductTransmission."#".$FuelType."#".$EngineType."#".$EngineDescription."#".$NoCylinder."#".$MileageCity."#".$MileageHighway."#".$FuelTank."#".$NoOwner."#".$air_conditioner."#".$braking_system."#".$power_steering."#".$power_window."#".$CD_player."#".$leather_seats."#".$central_locking."#".$door_lock.'#'.$ProductLink.'#'.$processor_configurations.'@'.$ProductImage;

echo wp_kses_post($productHtml);

exit; 

}





/*********************** Get Auto 2 for compare ************************************/

add_action('wp_ajax_MyAjaxFunctionProduct_2', 'carforyou_compareAuto2');

add_action('wp_ajax_nopriv_MyAjaxFunctionProduct_2', 'carforyou_compareAuto2');

 function carforyou_compareAuto2()

  {

	 global $wpdb;	 

   if(isset($_POST['productID'])) 

      {

		$productId = $_POST['productID'];

		$myarray = array($productId);

		$args = array( 'post_type' => 'auto', 'post__in' =>$myarray);

		$my_query1  = new WP_Query( $args );

		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post();

			//Product Title 	

			$ProductTitle = the_title();

			//Product Link	

			$ProductLink = get_permalink($post->ID);

			//Product Image 				

			$ProductImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID));	

			//Price 

			$ProductPrice= number_format_i18n(get_post_meta($productId, 'DREAM_auto_price', true ));

			//Brand 

			$term_list = wp_get_post_terms($productId,'auto-brand',array('fields'=>'ids'));

			$cat_id = (int)$term_list[0]; 

			$term = get_term_by( 'id', $cat_id, 'auto-brand', 'ARRAY_A' );

			$categoryname = $term['name'];				 				

			//Model 

			$ProductModel= get_post_meta($productId, 'DREAM_auto_model', true );

			//Model Year 

			$year_model_list = wp_get_post_terms($productId,'year-model',array('fields'=>'ids'));

			$year_model_id = (int)$year_model_list[0]; 

			$year_model_term = get_term_by( 'id', $year_model_id, 'auto-brand', 'ARRAY_A' );

			$year_model_name = $year_model_term['name'];

			//Model location 

			$location_list = wp_get_post_terms($productId,'auto-location',array('fields'=>'ids'));

			$location_id = (int)$location_list[0]; 

			$location_term = get_term_by( 'id', $location_id, 'auto-location', 'ARRAY_A' );

			$locationName = $location_term['name'];	

			//Condition  

			$ProductCondition= get_post_meta($productId, 'DREAM_auto_condition', true );

			//KM Done 

			$ProductKmDone= get_post_meta($productId, 'DREAM_auto_km_done', true );

			//Body Color

			$ProductBodyColor= get_post_meta($productId, 'DREAM_auto_body_color', true );

			//Seat Capacity

			$ProductSeatCapacity= get_post_meta($productId, 'DREAM_auto_seat_capacity', true );

			//Transmission

			$ProductTransmission= get_post_meta($productId, 'DREAM_auto_transmission', true );

			//Fuel Type

			$FuelType= get_post_meta($productId, 'DREAM_fuel_type', true );

			//Engine Type

			$EngineType= get_post_meta($productId, 'DREAM_auto_engine_type', true );

			//Engine Description

			$EngineDescription= get_post_meta($productId, 'DREAM_auto_engine_description', true );

			//No Of Cylinders

			$NoCylinder= get_post_meta($productId, 'DREAM_auto_no_of_cylinders', true );

			//Mileage City

			$MileageCity= get_post_meta($productId, 'DREAM_auto_mileage_city', true );

			//Mileage Highway

			$MileageHighway= get_post_meta($productId, 'DREAM_auto_mileage_highway', true );

			//Fuel Tank Capacity

			$FuelTank= get_post_meta($productId, 'DREAM_auto_fuel_tank_capacity', true );

			//No Owner

			$NoOwner= get_post_meta($productId, 'DREAM_auto_no_of_Owners', true );

			

			//Accessories

			if(!empty(get_post_meta($productId, 'DREAM_air_conditioner', true ))):

				$air_conditioner ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$air_conditioner ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_braking_system', true ))):

				$braking_system ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$braking_system ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_steering', true ))):

				$power_steering ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_steering ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_window', true ))):

				$power_window ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_window ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_CD_player', true ))):

				$CD_player ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$CD_player ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_leather_seats', true ))):

				$leather_seats ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$leather_seats ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_central_locking', true ))):

				$central_locking ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$central_locking ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_door_lock', true ))):

				$door_lock ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$door_lock ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;



		endwhile;

	  }

$productHtml=$ProductTitle."#".$ProductPrice."#".$categoryname."#".$postid."#".$ProductModel."#".$year_model_name."#".$locationName."#".$ProductCondition."#".$ProductKmDone."#".$ProductBodyColor."#".$ProductSeatCapacity."#".$ProductTransmission."#".$FuelType."#".$EngineType."#".$EngineDescription."#".$NoCylinder."#".$MileageCity."#".$MileageHighway."#".$FuelTank."#".$NoOwner."#".$air_conditioner."#".$braking_system."#".$power_steering."#".$power_window."#".$CD_player."#".$leather_seats."#".$central_locking."#".$door_lock.'#'.$ProductLink.'#'.$processor_configurations.'@'.$ProductImage;

echo wp_kses_post($productHtml);

exit; 

}



/*********************** Get Auto 3 for compare ************************************/

add_action('wp_ajax_MyAjaxFunctionProduct_3', 'carforyou_compareAuto3');

add_action('wp_ajax_nopriv_MyAjaxFunctionProduct_3', 'carforyou_compareAuto3');

 function carforyou_compareAuto3()

  {

	 global $wpdb;	 

   if(isset($_POST['productID'])) 

      {

		$productId = $_POST['productID'];

		$myarray = array($productId);

		$args = array( 'post_type' => 'auto', 'post__in' =>$myarray);

		$my_query1  = new WP_Query( $args );

		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post();

			//Product Title 	

			$ProductTitle = the_title();

			//Product Link	

			$ProductLink = get_permalink($post->ID);

			//Product Image 				

			$ProductImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID));	

			//Price 

			$ProductPrice= number_format_i18n(get_post_meta($productId, 'DREAM_auto_price', true ));

			//Brand 

			$term_list = wp_get_post_terms($productId,'auto-brand',array('fields'=>'ids'));

			$cat_id = (int)$term_list[0]; 

			$term = get_term_by( 'id', $cat_id, 'auto-brand', 'ARRAY_A' );

			$categoryname = $term['name'];				 				

			//Model 

			$ProductModel= get_post_meta($productId, 'DREAM_auto_model', true );

			//Model Year 

			$year_model_list = wp_get_post_terms($productId,'year-model',array('fields'=>'ids'));

			$year_model_id = (int)$year_model_list[0]; 

			$year_model_term = get_term_by( 'id', $year_model_id, 'auto-brand', 'ARRAY_A' );

			$year_model_name = $year_model_term['name'];

			//Model location 

			$location_list = wp_get_post_terms($productId,'auto-location',array('fields'=>'ids'));

			$location_id = (int)$location_list[0]; 

			$location_term = get_term_by( 'id', $location_id, 'auto-location', 'ARRAY_A' );

			$locationName = $location_term['name'];	

			//Condition  

			$ProductCondition= get_post_meta($productId, 'DREAM_auto_condition', true );

			//KM Done 

			$ProductKmDone= get_post_meta($productId, 'DREAM_auto_km_done', true );

			//Body Color

			$ProductBodyColor= get_post_meta($productId, 'DREAM_auto_body_color', true );

			//Seat Capacity

			$ProductSeatCapacity= get_post_meta($productId, 'DREAM_auto_seat_capacity', true );

			//Transmission

			$ProductTransmission= get_post_meta($productId, 'DREAM_auto_transmission', true );

			//Fuel Type

			$FuelType= get_post_meta($productId, 'DREAM_fuel_type', true );

			//Engine Type

			$EngineType= get_post_meta($productId, 'DREAM_auto_engine_type', true );

			//Engine Description

			$EngineDescription= get_post_meta($productId, 'DREAM_auto_engine_description', true );

			//No Of Cylinders

			$NoCylinder= get_post_meta($productId, 'DREAM_auto_no_of_cylinders', true );

			//Mileage City

			$MileageCity= get_post_meta($productId, 'DREAM_auto_mileage_city', true );

			//Mileage Highway

			$MileageHighway= get_post_meta($productId, 'DREAM_auto_mileage_highway', true );

			//Fuel Tank Capacity

			$FuelTank= get_post_meta($productId, 'DREAM_auto_fuel_tank_capacity', true );

			//No Owner

			$NoOwner= get_post_meta($productId, 'DREAM_auto_no_of_Owners', true );

			

			//Accessories

			if(!empty(get_post_meta($productId, 'DREAM_air_conditioner', true ))):

				$air_conditioner ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$air_conditioner ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_braking_system', true ))):

				$braking_system ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$braking_system ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_steering', true ))):

				$power_steering ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_steering ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_window', true ))):

				$power_window ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$power_window ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_CD_player', true ))):

				$CD_player ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$CD_player ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_leather_seats', true ))):

				$leather_seats ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$leather_seats ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_central_locking', true ))):

				$central_locking ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$central_locking ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;

			if(!empty(get_post_meta($productId, 'DREAM_power_door_lock', true ))):

				$door_lock ='<i class="fa fa-check" aria-hidden="true"></i>';

				 else:

				$door_lock ='<i class="fa fa-close" aria-hidden="true"></i>';

			endif;



		endwhile;

	  }

$productHtml=$ProductTitle."#".$ProductPrice."#".$categoryname."#".$postid."#".$ProductModel."#".$year_model_name."#".$locationName."#".$ProductCondition."#".$ProductKmDone."#".$ProductBodyColor."#".$ProductSeatCapacity."#".$ProductTransmission."#".$FuelType."#".$EngineType."#".$EngineDescription."#".$NoCylinder."#".$MileageCity."#".$MileageHighway."#".$FuelTank."#".$NoOwner."#".$air_conditioner."#".$braking_system."#".$power_steering."#".$power_window."#".$CD_player."#".$leather_seats."#".$central_locking."#".$door_lock.'#'.$ProductLink.'#'.$processor_configurations.'@'.$ProductImage;

echo wp_kses_post($productHtml);

exit; 

}



/*********************** Get shop product  for compare ************************************/

add_action('wp_ajax_MyAjaxFunctionProductShop', 'carforyou_AutoReplace');

add_action('wp_ajax_nopriv_MyAjaxFunctionProductShop', 'carforyou_AutoReplace'); 

 function carforyou_AutoReplace(){

	 $ProductImage='';

	 $postid='';

    if(isset($_POST['productID'])){

        $productId = $_POST['productID'];        

	    global $wpdb;

		$ProductImage = wp_get_attachment_url( get_post_thumbnail_id($productId) );

	 }

	 $productHtml=$productId.'@'.$ProductImage;

echo wp_kses_post($productHtml);

exit; }