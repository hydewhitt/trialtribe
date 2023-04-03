<?php
/**
 * Theme functions and definitions
 *
 * @package corponotch_law
 */ 


if ( ! function_exists( 'corponotch_law_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function corponotch_law_enqueue_styles() {
		wp_enqueue_style( 'corponotch-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'corponotch-law-style', get_stylesheet_directory_uri() . '/style.css', array( 'corponotch-style-parent' ), '1.0.0' );

        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'corponotch-law-fonts', corponotch_law_fonts_url(), array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'corponotch_law_enqueue_styles', 99 );

function corponotch_law_do_action() {
    remove_action( 'corponotch_header_start_action', 'corponotch_header_start', 10 );
}
add_action( 'init', 'corponotch_law_do_action');

/**
 * Enqueue editor styles for Gutenberg
 */
function corponotch_law_block_editor_styles() {
    // Add custom fonts.
    wp_enqueue_style( 'corponotch-law-fonts', corponotch_law_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'corponotch_law_block_editor_styles' );

if ( ! function_exists( 'corponotch_law_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function corponotch_law_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'corponotch-law' ) ) {
        $fonts[] = 'Playfair Display:300,400,500,600,700';
    }

    /* translators: If there are characters in your language that are not supported by Quattrocento, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Quattrocento font: on or off', 'corponotch-law' ) ) {
        $fonts[] = 'Quattrocento:300,400,500,600,700';
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
    );

    if ( $fonts ) {
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}
endif;

// Add class to body.
add_filter( 'body_class', 'corponotch_law_add_body_class' );
function corponotch_law_add_body_class( $classes ) {
    return array_merge( $classes, array( 'header-font-8', 'body-font-4' ) );
}

if ( ! function_exists( 'corponotch_law_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function corponotch_law_theme_defaults( $defaults ) {
        $defaults['enable_slider'] = false;
        $defaults['blog_column_type'] = 'column-1';

        return $defaults;
    }
endif;
add_filter( 'corponotch_default_theme_options', 'corponotch_law_theme_defaults', 99 );

if ( ! function_exists( 'corponotch_law_header_start' ) ) :
    /**
     * Header starts html codes
     *
     * @since CorpoNotch 1.0.0
     */
    function corponotch_law_header_start() { 
        $sticky_header = corponotch_theme_option( 'enable_sticky_header' ) ? 'sticky-header' : ''; 
        ?>
        <header id="masthead" class="site-header absolute-header <?php echo esc_attr( $sticky_header ); ?>">
        <div class="wrapper">
    <?php }
endif;
add_action( 'corponotch_header_start_action', 'corponotch_law_header_start', 10 );


if ( ! function_exists( 'corponotch_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since CorpoNotch 1.0.0
   *
   */
   function corponotch_render_service_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = corponotch_theme_option( 'service_title', '' );
        $sub_title = corponotch_theme_option( 'service_sub_title', '' );

        ?>
        <div class="our-services page-section relative center-align">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $sub_title ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif;

                        if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['icon'] ) ) : ?>
                                    <div class="service">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                        </a>
                                    </div><!-- .service -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;

