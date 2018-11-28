( function($) {
  'use strict';
$(function(e) {

/*------------------------------------------------------------------
	Responsive sub-menu btn
	-------------------------------------------------------------------*/
//
$('.sub-menu').removeClass('sub-menu').addClass('dropdown-menu');
$('.menu-item-has-children').click(function(){
	$(this).closest('li').children('.dropdown-menu').slideToggle();
});
/*------------------------------------------------------------------
	Banner-Slideshow
	-------------------------------------------------------------------*/
if (screen.width < 768) {
	$('#banner2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	rtl:true,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}
else {
	$('#banner2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	autoWidth:true,
	rtl:true,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}
/*------------------------------------------------------------------
	Testimonial Slider
	-------------------------------------------------------------------*/
$('#testimonial-slider .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
})	

/*------------------------------------------------------------------
	Testimonial Slider 2
	-------------------------------------------------------------------*/	
$('#testimonial-slider-2 .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	


/*------------------------------------------------------------------
	Trending Slider
	-------------------------------------------------------------------*/
$('#trending_slider .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	

/*------------------------------------------------------------------
	Popular Brands
	-------------------------------------------------------------------*/
$('#popular_brands .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
	rtl:true,
	autoplay  : 3000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})	


/*------------------------------------------------------------------
	Listing Image Slider { Style 1}
	-------------------------------------------------------------------*/	
$('#listing_img_slider .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
	dots:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	



/*------------------------------------------------------------------
	Listing Image Slider { Style 2}
	-------------------------------------------------------------------*/
	$('.listing_images_slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  //rtl:true,
	  asNavFor: '.listing_images_slider_nav'
	});
	$('.listing_images_slider_nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.listing_images_slider',
	  dots: false,
	  //rtl:true,
	  centerMode: true,
	  focusOnSelect: true
	});

/*------------------------------------------------------------------
	Search-button
	-------------------------------------------------------------------*/
	$("#search_toggle").click(function(){
		$("#header-search-form").slideToggle();
	});



/*------------------------------------------------------------------
	Filter-Form
	-------------------------------------------------------------------*/
	$("#filter_toggle").click(function(){
		$("#filter_form").slideToggle();
	});


$('#c-date').datepicker({
	format: 'dd/mm/yyyy'
});

/*------------------------------------------------------------------
	Other-info
	-------------------------------------------------------------------*/
	$("#other_info").click(function(){
		$("#info_toggle").slideToggle();
	});

/*------------------------------------------------------------------
	-------------------------------------------------------------------*/
//  Honda City 1.5 CVT Honda Civic 1.5L VTEC TURBO Honda Accord 2.4 AT Honda CR-V 2.0 AT Honda CR-V 2.4 AT Honda CR-V 2.4 AT TG Honda Odyssey 2.4CVT	
var car_prices = {
	car1 : {
		name: "Honda City 1.5",
		price: "559,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/01-City.png"
	},
	car2 : {
		name: "Honda City 1.5 TOP",
		price: "599,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/01-City.png"
	},
	car3 : {
		name: "Honda Civic 1.5 L",
		price: "898,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/02-Civic.png"
	},
	car4 : {
		name: "Honda Civic 1.5 G",
		price: "826,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/02-Civic.png"
	},
	car5 : {
		name: "Honda Civic 1.5 E",
		price: "758,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/02-Civic.png"
	},
	car6 : {
		name: "Honda Accord 2.4 AT",
		price: "1,198,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/02-Civic.png"
	},
	car7 : {
		name: "Honda CR-V 1.5 L",
		price: "1,068,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	},
	car8 : {
		name: "Honda CR-V 1.5 G",
		price: "998,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	},
	car9 : {
		name: "Honda CR-V 1.5 E",
		price: "958,000,000",
		img: "http://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	},
	car10 : {
		name: "Honda Odyssey 2.4CVT",
		price: "1,990,000,000",
		img: "http://hondaotobinhdinh.vn/wp-content/uploads/2017/05/odyssey.png"
	},
	car11 : {
		name: "Honda Jazz 1.5 RS",
		price: "619,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	},
	car12 : {
		name: "Honda Jazz 1.5 VX",
		price: "589,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	},
	car13 : {
		name: "Honda Jazz 1.5 V",
		price: "539,000,000",
		img: "https://hondaotobinhdinh.vn/wp-content/uploads/2017/05/crv.png"
	}
}

$(window).load(function(){

$.each(car_prices, function (i, car_price) {
    $('#car-name').append('<option value="' + car_price.price + '" data-img="' + car_price.img + '">' + car_price.name + '</option>');
});	

var price_payment = jQuery('.pcd-pricing .pcd-price#auto-price').text();
jQuery('.payment-form .payment-price').attr('value',jQuery.trim(price_payment));
var start_rate = jQuery('.down-pay-percent option:selected').attr('data-input');
jQuery('.pay_rate').val(start_rate);
jQuery('.down-pay-percent').on('change', function(){
	var rate = jQuery(this).find('option:selected').attr('data-input');
	jQuery('.pay_rate').val(rate);
});

function formatMoney(n) {
    return (n+'').replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}
function formatNumber(s){
	return (s+'').replace(/[^0-9]/g, '');
}

jQuery('.payment_cal_btn').on('click', function(){	
	var price_item = $('#car-name').val();
	$('#car-price').text(price_item);
	
	var price_number = formatNumber(price_item);
	var prePrice = price_number*10/100;
	$('#sumprice').text(formatMoney(prePrice));
	
	var phiDangKiem = 340000;
	
	var lephidk = $('.payment-location').val();
	$('.lephidangky').text(formatMoney(lephidk));
	
	var phiDuongBo = $('.owner-type').val();
	$('.phiduongbo').text(formatMoney(phiDuongBo));
	
	var baoHiemTNDS = 580700;
	
	var sumPrice = price_number * 1 + prePrice + lephidk * 1 + phiDangKiem + phiDuongBo * 1 + baoHiemTNDS;
	$('#totalPrice').text(formatMoney(sumPrice));
})
});

$('#down-pay-bank').change(function()
{
	var rate = $(this).val();
	$('#pay-rate').val(rate);
}); 
/*-------------------------------------------------------------------------------
	Short Order
-------------------------------------------------------------------------------*/
 $('#auto_price_list').change(function()
 {
     $('#ShortOrder').submit();
 }); 	

/*-------------------------------------------------------------------------------
	Add Placeholder
-------------------------------------------------------------------------------*/
	$("#comment").attr("placeholder", "Comment");	
/*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
});
/*------------------------------------------------------------------
	Price-Range
	-------------------------------------------------------------------*/
	$("#price_range").slider({});

var x = screen.width + "px";
document.getElementById("siderwidth1").style.width = x;
document.getElementById("siderwidth2").style.width = x;
document.getElementById("siderwidth3").style.width = x;
document.getElementById("siderwidth4").style.width = x;
document.getElementById("siderwidth5").style.width = x;
document.getElementById("siderwidth6").style.width = x;

})(jQuery);