<?php
/**
 * woocommerce functions and definitions
 *
 * @package corponotch_pro
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function corponotch_pro_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'corponotch_pro_woocommerce_setup' );

if ( ! function_exists( 'corponotch_pro_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function corponotch_pro_woocommerce_product_wrapper_open() {
		echo '<div class="single-template-wrapper wrapper page-section">';
	}
}
add_action( 'woocommerce_before_main_content', 'corponotch_pro_woocommerce_product_wrapper_open', 5 );

if ( ! function_exists( 'corponotch_pro_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function corponotch_pro_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_sidebar', 'corponotch_pro_woocommerce_product_columns_wrapper_close', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

if ( ! function_exists( 'corponotch_pro_woocommerce_hide_page_title' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function corponotch_pro_woocommerce_hide_page_title() {
		return false;
	}
}
add_filter( 'woocommerce_show_page_title', 'corponotch_pro_woocommerce_hide_page_title' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'corponotch_pro_loop_columns');

if ( ! function_exists( 'corponotch_pro_loop_columns' ) ) {
	function corponotch_pro_loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter( 'woocommerce_pagination_args', 'corponotch_pro_woocommerce_pagination' );
if ( ! function_exists( 'corponotch_pro_woocommerce_pagination' ) ) {
	function corponotch_pro_woocommerce_pagination( $args ) {
		$args['prev_text'] = corponotch_pro_get_svg( array( 'icon' => 'angle-left' ) );
		$args['next_text'] = corponotch_pro_get_svg( array( 'icon' => 'angle-right' ) );
		$args['mid_size']  = 4;

		return $args;
	}
}

add_filter( 'get_product_search_form', 'corponotch_pro_product_search' );
if ( ! function_exists( 'corponotch_pro_product_search' ) ) { 
	function corponotch_pro_product_search() { ?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'corponotch-pro' ); ?></label>
			<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'corponotch-pro' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<input type="hidden" name="post_type" value="product" />
			<button type="submit" class="search-submit"><?php echo corponotch_pro_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'corponotch-pro' ); ?></span></button>
		</form>
	<?php }
}
