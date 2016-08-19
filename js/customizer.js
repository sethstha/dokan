/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Header top color.
	wp.customize( 'dokan_color_header_top', function( value ) {
		value.bind( function( to ) {
			$('.header-top').css('background', to);
		} );
	} );

	// footer top color.
	wp.customize( 'dokan_color_footer_top', function( value ) {
		value.bind( function( to ) {
			$('.footer-top').css('background', to);
		} );
	} );

	// footer middle color.
	wp.customize( 'dokan_color_footer_middle', function( value ) {
		value.bind( function( to ) {
			$('.footer-middle').css('background', to);
		} );
	} );

	// footer bottom color.
	wp.customize( 'dokan_color_footer_bottom', function( value ) {
		value.bind( function( to ) {
			$('.footer-bottom').css('background', to);
		} );
	} );
} )( jQuery );
