jQuery(document).ready(function() {
	jQuery(".header-actions .haction-search").hover(function() {
		jQuery(".search-form", this).fadeIn('fast');
	}, function() {
		jQuery(".search-form", this).fadeOut('fast');
	});


	/*========================================
	=            PRODUCT ON HOVER            =
	========================================*/
	
	jQuery('.products .product').hover(function() {
		jQuery('.product-thumbnail .top-actions', this).fadeIn('300');
	}, function() {
		jQuery('.product-thumbnail .top-actions', this).fadeOut('300');
	});
	
	/*=====  End of PRODUCT ON HOVER  ======*/
	
	/*========================================
	=            On scroll header	         =
	========================================*/
	
	// jQuery(window).resize(function() {
	// 	if(jQuery(window).width() >= 420){
		 	jQuery(function(){
				jQuery(window).scroll(function() {
					if ( window.pageYOffset >= 600 ) {
						jQuery('.header-main .header-top').slideUp('fast');
						jQuery('.header-main .header-bottom').addClass('shrink');
						jQuery('.logo-main-site').slideUp('fast');
					}
					else {
						jQuery('.header-main .header-top').slideDown('fast');
						jQuery('.header-main .header-bottom').removeClass('shrink');
						jQuery('.logo-main-site').slideDown('fast');
					}
				});
			});
	// 	}
	// });

	
	jQuery(document).on({
		mouseenter: function () {
			jQuery(this).find('.header-mini-cart-wrapper').fadeIn();
		},
		mouseleave: function () {
			jQuery(this).find('.header-mini-cart-wrapper').fadeOut();
		}
	}, '.header-actions .haction-mini-cart');
	/*=====  End of On scroll header	  ======*/
	
});

/*====================================================
=            INCREMENT DECREMENT QUANTITY            =
====================================================*/

jQuery(".buttons_added .minus").click(function() {
	var $qty=jQuery(this).next('.qty');
	var currentVal = parseInt($qty.val());
	if (!isNaN(currentVal) && currentVal > 1) {
		$qty.val(currentVal - 1);
	}
});

jQuery(".buttons_added .plus").click(function() {
	var $qty=jQuery(this).prev('.qty');
	var currentVal = parseInt($qty.val());
	if (!isNaN(currentVal)) {
		$qty.val(currentVal + 1);
	}
});

jQuery(".sidebar-button-toggler").click(function() {
	jQuery("#secondary").toggle('fast');
	jQuery(".woocommerce-filters").toggle('fast');
});

/*=====  End of INCREMENT DECREMENT QUANTITY  ======*/