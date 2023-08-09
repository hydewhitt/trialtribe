<?php
function my_theme_enqueue_styles() {
    $parent_style = 'corponotch-pro-premium-style'; // This is 'parent-style' for the Twenty Seventeen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/********************************************************************************************************************************************************************************************************
 * GFORM FILTERS
 ************************************************************************************************************************************************************************************************************************************************************************* */
add_filter( 'gform_confirmation_anchor', '__return_false' );
add_filter( 'gform_progressbar_start_at_zero', '__return_true' );

/***************************************************************************************************************************************************************************************************************************************************************************
 * Counter hook
 *
 * @package corponotch_pro
 *************************************************************************************************************************************************************************************************************************************************************************/
if ( ! function_exists( 'corponotch_pro_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_counter_section() {

        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'corponotch_pro_section_status', 'enable_counter', 'counter_entire_site' );

        if ( ! $counter_enable )
            return false;

        // Render counter section now.
        corponotch_pro_render_counter_section();
    }
endif;

if ( ! function_exists( 'corponotch_pro_render_counter_section' ) ) :
    /**
     * Start counter section
     *
     * @return string counter content
     * @since CorpoNotch Pro 1.0.0
     *
     */
     function corponotch_pro_render_counter_section() {
          $image = corponotch_pro_theme_option( 'counter_image', '' );
          $repuation_image = get_stylesheet_directory_uri() . '/assets/uploads/reputation-image.jpg';
          $counter_opacity = corponotch_pro_theme_option( 'counter_opacity', 0 );
          $content_details = array();

          $workplace_counter['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/workplace-injury-icon.png';
          $workplace_counter['value'] = "$6M";
          $workplace_counter['label'] = "Workplace Injury";
          array_push( $content_details, $workplace_counter );

          $moto_counter['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/motorcycle-wreck-icon.png';
          $moto_counter['value'] = "$3M";
          $moto_counter['label'] = "Motorcycle Collision";
          array_push( $content_details, $moto_counter );

          $truck_counter['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/commercial-truck-collision-icon.png';
          $truck_counter['value'] = "$1M";
          $truck_counter['label'] = "Comercial Truck Collision";
          array_push( $content_details, $truck_counter );

          $premises_counter['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/premises-defect-icon.png';
          $premises_counter['value'] = "$1M";
          $premises_counter['label'] = "Premises Defect";
          array_push( $content_details, $premises_counter );

          $car_counter['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/car-collision-icon.png';
          $car_counter['value'] = "$500K";
          $car_counter['label'] = "Car Collision";
          array_push( $content_details, $car_counter );

          $multi_million['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/multi-million-dollar.png';
          
          $million_icon['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/million-dollar.png';

          $forty_under['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/forty-under.png';

          $texas_trial['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/texas-trial.png';

          $super_lawyers['icon'] = get_stylesheet_directory_uri() . '/assets/uploads/rising-stars-logo.png';


        //   for ( $i = 1; $i <= 4; $i++ ) {
        //       $label = corponotch_pro_theme_option( 'counter_label_' . $i, '' );
        //       $value = corponotch_pro_theme_option( 'counter_value_' . $i, '' );
  
        //       if ( ! empty( $label ) && ! empty( $value )  ) :
        //           $counter['icon']  = corponotch_pro_theme_option( 'counter_icon_' . $i, 'fa-certificate' );
        //           $counter['label'] = $label;
        //           $counter['value'] = $value;
  
        //           array_push( $content_details, $counter );
        //       endif;
        //   }
  
          if ( empty( $content_details ) )
              return;
          ?>
          <div id="results-counter-section" class="page-section counter-widget relative"
              <?php if ( ! empty( $image ) ) : ?> 
                  style="background-image: url('<?php echo esc_url( $image ); ?>');"
              <?php endif; ?>>
              <div class="overlay" style="opacity: 0.<?php echo absint( $counter_opacity ); ?>"></div>
              <div class="results-text">
                <h3>Results</h3>
                <h1>Matter.</h1>
                <p>Trust the team with a proven track record.</p>
              </div>
              <div class="results-ribbon"></div>
              <div class="wrapper">
                  <div class="section-content column-<?php echo absint( count( $content_details ) ); ?>">
                    <img class="counter-icon workplace-icon" src="<?php echo esc_url( $workplace_counter['icon'] ); ?>" style=" grid-column: 1; grid-row: 1;"></img>
                    <div class="counter-value" style="grid-column:  1; grid-row: 2;">$6<span class="counter-scale">M</span></div>
                    <h5 class="counter-label"style="grid-column:  1; grid-row: 3;">Workplace Injury</h5>

                    <img class="counter-icon moto-icon" src="<?php echo esc_url( $moto_counter['icon'] ); ?>" style=" grid-column: 2; grid-row: 1;"></img>
                    <div class="counter-value" style="grid-column:  2; grid-row: 2;">$3<span class="counter-scale">M</span></div>
                    <h5 class="counter-label"style="grid-column:  2; grid-row: 3;">Motorcycle Collision</h5>

                    <img class="counter-icon truck-icon" src="<?php echo esc_url( $truck_counter['icon'] ); ?>" style=" grid-column: 3; grid-row: 1;"></img>
                    <div class="counter-value" style="grid-column:  3; grid-row: 2;">$1<span class="counter-scale">M</span></div>
                    <h5 class="counter-label"style="grid-column:  3; grid-row: 3;">Commercial Truck Collision</h5>

                    <img class="counter-icon premises-icon" src="<?php echo esc_url( $premises_counter['icon'] ); ?>" style=" grid-column: 4; grid-row: 1;"></img>
                    <div class="counter-value" style="grid-column:  4; grid-row: 2;">$1<span class="counter-scale">M</span></div>
                    <h5 class="counter-label"style="grid-column:  4; grid-row: 3;">Premises<br>Defect</h5>

                    <img class="counter-icon car-icon" src="<?php echo esc_url( $car_counter['icon'] ); ?>" style=" grid-column: 5; grid-row: 1;"></img>
                    <div class="counter-value" style="grid-column:  5; grid-row: 2;">$500<span class="counter-scale">K</span></div>
                    <h5 class="counter-label"style="grid-column:  5; grid-row: 3;">Car Collision</h5>
                  </div><!-- .section-content -->
                  <div class="section-content-counter-mobile results-section-content">
                    <div>
                        <img class="counter-icon workplace-icon" src="<?php echo esc_url( $workplace_counter['icon'] ); ?>" style=" grid-column: 1; grid-row: 1;"></img>
                        <div class="counter-value" style="grid-column:  1; grid-row: 2;">$6<span class="counter-scale">M</span></div>
                        <h5 class="counter-label"style="grid-column:  1; grid-row: 3;">Workplace Injury</h5>
                    </div>
                    <div>
                        <img class="counter-icon moto-icon" src="<?php echo esc_url( $moto_counter['icon'] ); ?>" style=" grid-column: 2; grid-row: 1;"></img>
                        <div class="counter-value" style="grid-column:  2; grid-row: 2;">$3<span class="counter-scale">M</span></div>
                        <h5 class="counter-label"style="grid-column:  2; grid-row: 3;">Motorcycle Collision</h5>
                    </div>
                    <div>
                        <img class="counter-icon truck-icon" src="<?php echo esc_url( $truck_counter['icon'] ); ?>" style=" grid-column: 3; grid-row: 1;"></img>
                        <div class="counter-value" style="grid-column:  3; grid-row: 2;">$1<span class="counter-scale">M</span></div>
                        <h5 class="counter-label"style="grid-column:  3; grid-row: 3;">Commercial Truck Collision</h5>
                    </div>
                    <div>
                        <img class="counter-icon premises-icon" src="<?php echo esc_url( $premises_counter['icon'] ); ?>" style=" grid-column: 4; grid-row: 1;"></img>
                        <div class="counter-value" style="grid-column:  4; grid-row: 2;">$1<span class="counter-scale">M</span></div>
                        <h5 class="counter-label"style="grid-column:  4; grid-row: 3;">Premises<br>Defect</h5>
                    </div>
                    <div>
                        <img class="counter-icon car-icon" src="<?php echo esc_url( $car_counter['icon'] ); ?>" style=" grid-column: 5; grid-row: 1;"></img>
                        <div class="counter-value" style="grid-column:  5; grid-row: 2;">$500<span class="counter-scale">K</span></div>
                        <h5 class="counter-label"style="grid-column:  5; grid-row: 3;">Car Collision</h5>
                    </div>
                </div><!-- .section-content -->
              </div><!-- .wrapper -->
          </div><!-- #counter -->

          <div id="reputation-logos" class="page-section counter-widget relative"
              <?php if ( ! empty( $image ) ) : ?> 
                  style="background-image: url('<?php echo esc_url( $repuation_image ); ?>');"
              <?php endif; ?>>
              <div class="overlay" style="opacity: 0.<?php echo absint( $counter_opacity ); ?>"></div>
              <div class="results-text reputation-text-container">
                <div class="">
                    <h3 class="reputation-text">Reputation</h3>
                    <h1>Matters.</h1>
                </div>
                <p class="reputation-p">Rich Hyde is recognized amongst the most talented attorneys in the country.</p>
              </div>
              
              <div class="results-ribbon reputation-ribbon"></div>
              <div class="wrapper">
                  <div class="section-content column-<?php echo absint( count( $content_details ) ); ?>">
                    <img class="reputation-icon multi-million-icon" src="<?php echo esc_url( $multi_million['icon'] ); ?>" style=" grid-column: 1; grid-row: 1;"></img>

                    <img class="reputation-icon million-icon" src="<?php echo esc_url( $million_icon['icon'] ); ?>" style=" grid-column: 2; grid-row: 1;"></img>

                    <img class="reputation-icon forty-under-icon" src="<?php echo esc_url( $forty_under['icon'] ); ?>" style=" grid-column: 3; grid-row: 1;"></img>

                    <img class="reputation-icon texas-trial-icon" src="<?php echo esc_url( $texas_trial['icon'] ); ?>" style=" grid-column: 4; grid-row: 1;"></img>

                    <img class="reputation-icon super-lawyers-icon" src="<?php echo esc_url( $super_lawyers['icon'] ); ?>" style=" grid-column: 5; grid-row: 1;"></img>

                  </div><!-- .section-content -->
                  <div class="section-content-counter-mobile reputation-section-content">
                    <div style="margin: 25px auto;">
                        <img class="reputation-icon multi-million-icon" src="<?php echo esc_url( $multi_million['icon'] ); ?>" style=" grid-column: 1; grid-row: 1;"></img>
                    </div>
                    <div style="margin: 25px auto;">
                        <img class="reputation-icon million-icon" src="<?php echo esc_url( $million_icon['icon'] ); ?>" style=" grid-column: 2; grid-row: 1;"></img>
                    </div>
                    <div style="margin: 25px auto;">
                        <img class="reputation-icon forty-under-icon" src="<?php echo esc_url( $forty_under['icon'] ); ?>" style=" grid-column: 3; grid-row: 1;"></img>
                    </div>
                    <div style="margin: 25px auto;">
                       <img class="reputation-icon texas-trial-icon" src="<?php echo esc_url( $texas_trial['icon'] ); ?>" style=" grid-column: 4; grid-row: 1;"></img>
                    </div>
                    <div style="margin: 25px auto;">
                        <img class="reputation-icon super-lawyers-icon" src="<?php echo esc_url( $super_lawyers['icon'] ); ?>" style=" grid-column: 5; grid-row: 1;"></img>
                    </div>
                </div><!-- .section-content -->
              </div><!-- .wrapper -->
          </div><!-- #counter -->
      <?php 
      }
  endif;
/************************************************************************************************************************************************************************************************************************************************************************* 

CUSTOM HEADER

*************************************************************************************************************************************************************************************************************************************************************************/
if ( ! function_exists( 'corponotch_pro_custom_header' ) ) :
	/**
	 * Site content codes
	 *
	 * @since CorpoNotch Pro 1.0.0
	 *
	 */
	function corponotch_pro_custom_header() {
		if ( ! is_home() && is_front_page() ) {
			return;
		}
		
		$header_layout = corponotch_pro_theme_option( 'header_layout', 'normal-header' );
		$image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/uploads/banner.jpg';
		if ( is_singular() ) {
			$image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $image;
		}
        
		$image_height = (is_page('Start Your Case') || is_page('Quick Case')) ? 'height: 850px;' : '';
		?>
		<?php 
		if(is_page('Contact Us')) {
            $image = get_stylesheet_directory_uri() . '/assets/uploads/ContactUsBannerCompressed.jpg';
            ?> <div class="inner-header-image contact-us-header <?php echo ( 'absolute-header' == $header_layout ) ? 'inner-header-absolute' : ''; ?>" style="background-image: url( '<?php echo esc_url( $image ); ?>' ); <?php echo $image_height ?>"> <?php
        }
		?> 
        <?php if(!is_page('Contact Us')){
            $post_id = get_the_ID();

            // Get the post's slug using the post ID
            $page_slug = get_post_field('post_name', $post_id);
            
            // Generate the dynamic CSS class
            $header_class = $page_slug . '-header';
            ?><div class="inner-header-image <?php echo ( is_page('Rich Hyde, Texas Trial Attorney') == $header_layout ) ? 'about-rich-header' : ''; ?> <?php echo esc_attr($header_class); ?> <?php echo ( 'absolute-header' == $header_layout ) ? 'inner-header-absolute' : ''; ?>" style="background-image: url( '<?php echo esc_url( $image ); ?>' ); <?php echo $image_height ?>"> <?php
        }
        ?>
        	<div class="overlay"></div>
        	<div class="wrapper">
                <div class="<?php (!is_page('Start Your Case') && !is_page('Quick Case')) ? 'custom-header-content' : '' ?>">
                    <?php 
					if(is_page('Start Your Case')){
						gravity_form( 2, true, false, false, '', false );
					}
                    if(is_page('Quick Case')){
                        ?>
                        <div class="quick-case-container">
                            <?php gravity_form( 'Get Your Free Case Evaluation', true, false, false, '', false ); ?>
                        </div>
                        <?php
					}
                    if(is_page('Thank You')) {
                        ?>
                        <div class="thank-you-container">
                            <h1 class="thank-you-title">Thank You</h1>
                            <h3 class="thank-you-text">The attorney will reach out to you shortly.</h3>
                            <h3 class="thank-you-text-highlighted">Please stay near your phone.</h3>
                        </div>
                        <?php
                    }
					if(!is_page('Start Your Case') && !is_page('Thank You') && !is_page('Quick Case') && !is_page('Contact Us') && !is_page("Rich Hyde, Texas Trial Attorney")){
						echo corponotch_pro_custom_header_title();
						corponotch_pro_add_breadcrumb(); 
					}
                    ?>
                </div><!-- .custom-header-content -->
        	</div><!-- .wrapper -->
        </div><!-- .custom-header-content-wrapper -->
		<?php
	}
endif;

/************************************************************************************************************************************************************************************************************************************************************************* 

CALL TO ACTION

*************************************************************************************************************************************************************************************************************************************************************************/


if ( ! function_exists( 'corponotch_pro_render_cta_section' ) ) :
    /**
     * Start cta section
     *
     * @return string cta content
     * @since CorpoNotch Pro 1.0.0
     *
     */
     function corponotch_pro_render_cta_section( $content_details = array() ) {
          $layout = corponotch_pro_theme_option( 'cta_align', 'left-align' );
          $cta_opacity = corponotch_pro_theme_option( 'cta_opacity', 0 );
          $read_more = corponotch_pro_theme_option( 'cta_btn_label', esc_html__( 'Explore Us', 'corponotch-pro' ) );
  
          if ( empty( $content_details ) )
              return;
  
          foreach ( $content_details as $content ) :  ?>
              <div class="page-section cta-section relative <?php echo esc_attr( $layout ); ?>" 
                  <?php if ( ! empty( $content['image'] ) ) : ?> 
                      style="background-color: #2d3436; background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);"
                  <?php endif; ?>>
                  <?php if ( ! empty( $content['image'] ) ) : ?> 
                      <div class="overlay" style="opacity: 0.<?php echo absint( $cta_opacity ); ?>"></div>
                  <?php endif; ?>
                  <div class="wrapper">
                      <?php if ( ! empty( $content['title'] ) ) : ?>
                          <div class="section-header align-center add-separator">
                          <h2 class="section-title cta-title">Later could be <span style="color: #FFFB00;">too late.</span> Act Now.</h2>
                          </div><!-- .section-header -->
                      <?php endif; ?>
  
                      <article class="hentry">
                          <div class="post-wrapper">
                              <div class="entry-container">
                                  <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                      <div class="entry-content">
                                          <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                      </div><!-- .entry-content -->
                                  <?php endif; ?>
                              </div><!-- .entry-container -->
                              
                              <div id="syc-button">
                                  <a href="<?php echo esc_url( $content['url'] ); ?>">
                                      <h2 class="start-your-case-label">Start Your Case Now</h2>
                                      <p class="start-your-case-info">(In Under 30 Seconds)</p>
                                  </a>
                                  
                              </div> 
                          </div><!-- .post-wrapper -->
                      </article>
                  </div><!-- .wrapper -->
              </div><!-- #cta -->
          <?php endforeach;
      }
  endif;

  
/************************************************************************************************************************************************************************************************************************************************************************* 

SHORT CTA

*************************************************************************************************************************************************************************************************************************************************************************/


if ( ! function_exists( 'corponotch_pro_render_short_cta_section' ) ) :
    /**
     * Start short_cta section
     *
     * @return string short_cta content
     * @since CorpoNotch Pro 1.0.0
     *
     */
     function corponotch_pro_render_short_cta_section( $content_details = array() ) {
          $read_more = corponotch_pro_theme_option( 'short_cta_btn_label', esc_html__( 'Contact Us', 'corponotch-pro' ) );
  
          if ( empty( $content_details ) )
              return;
  
          foreach ( $content_details as $content ) :  ?>
              <div class="short-cta-section cta-section relative left-align">
                  <div class="wrapper">
                    <?php gravity_form( 'Get Your Free Case Evaluation', true, false, false, '', false ); ?>
                  </div><!-- .wrapper -->
              </div><!-- #short_cta -->
          <?php endforeach;
      }
  endif;
  
/************************************************************************************************************************************************************************************************************************************************************************* 

PRO SLIDER

*************************************************************************************************************************************************************************************************************************************************************************/

if ( ! function_exists( 'corponotch_pro_render_slider_section' ) ) :
    /**
     * Start slider section
     *
     * @return string slider content
     * @since CorpoNotch Pro 1.0.0
     *
     */
     function corponotch_pro_render_slider_section( $content_details = array() ) {
          if ( empty( $content_details ) )
              return;
  
          $slider_control = corponotch_pro_theme_option( 'slider_arrow' );
          $slider_autoplay = corponotch_pro_theme_option( 'slider_autoplay' );
          $slider_btn_label = corponotch_pro_theme_option( 'slider_btn_label', '' );
          $slider_alt_btn_link = corponotch_pro_theme_option( 'slider_alt_btn_link', '' );
          $slider_alt_btn_label = corponotch_pro_theme_option( 'slider_alt_btn_label', '' );
          $slider_opacity = corponotch_pro_theme_option( 'slider_opacity', 0 );
          $slider_align = corponotch_pro_theme_option( 'slider_align', 'center-align' );
          $slider_text = corponotch_pro_theme_option( 'slider_text', 'light-text' );
          $slider_alt_btn_color = corponotch_pro_theme_option( 'slider_alt_btn_color' );
  
          $query = new WP_Query(
              array(
                  'post_type'              => 'page',
                  'title'                  => 'Start Your Case',
                  'post_status'            => 'all',
                  'posts_per_page'         => 1,
                  'no_found_rows'          => true,
                  'ignore_sticky_posts'    => true,
                  'update_post_term_cache' => false,
                  'update_post_meta_cache' => false,
                  'orderby'                => 'post_date ID',
                  'order'                  => 'ASC',
              )
          );
          
          if ( ! empty( $query->post ) ) {
              $page_got_by_title = $query->post;
          } else {
              $page_got_by_title = null;
          }
          $page_id = $page_got_by_title->ID;
          $permalink = get_permalink( $page_id );
          ?>
          <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
          <div id="custom-header">
              <div class="section-content banner-slider <?php echo esc_attr( $slider_align ); ?> <?php echo esc_attr( $slider_text ); ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_autoplay ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
                  <?php foreach ( $content_details as $content ) : ?>
                      <div class="custom-header-content-wrapper slide-item">
                          <?php if ( ! empty( $content['image'] ) ) : ?>
                              <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                          <?php endif; ?>
                          <div class="overlay" style="opacity: 0.<?php echo absint( $slider_opacity ); ?>"></div>
                          <div class="wrapper">
                              <div class="custom-header-content">
                                   <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                                      <p class="sub-title"><?php echo esc_html( $content['sub_title'] ); ?></p>
                                  <?php endif; 
  
                                  if ( ! empty( $content['title'] ) ) : ?>
                                      <h2 class="landing-title" style="text-align: start;"><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                  <?php endif; 
  
                                  if ( ! empty( $slider_btn_label ) ) : ?>
                                      <!-- <div id="syc-button">
                                          <a href="<?php echo esc_url( $permalink ); ?>">
                                              <h2 class="start-your-case-label">Start Your Case</h2>
                                              <p class="start-your-case-info">(In Under 30 Seconds)</p>
                                          </a>
                                          
                                      </div>  -->
  
                                  <?php endif;
  
                                  if ( ! empty( $slider_alt_btn_label ) && ! empty( $slider_alt_btn_link ) ) : ?>
                                      <div class="read-more alt-btn <?php echo $slider_alt_btn_color ? 'alt-btn-primary' : ''; ?>">
                                          <a href="<?php echo esc_url( $slider_alt_btn_link ); ?>"><?php echo esc_html( $slider_alt_btn_label ); ?></a>
                                      </div>
                                  <?php endif; ?>
                              </div><!-- .custom-header-content -->
                          </div>
                      </div><!-- .custom-header-content-wrapper -->
                  <?php endforeach; ?>
              </div><!-- .wrapper -->
  
              <?php if ( corponotch_pro_theme_option( 'enable_slider_wave', false ) ) : ?>
                  <div class="wave-saperator">
                      <?php echo corponotch_pro_get_svg( array( 'icon' => 'wave' ) ); ?>
                  </div>
              <?php endif; ?>
          </div><!-- #custom-header -->
      <?php 
      }
  endif;

/************************************************************************************************************************************************************************************************************************************************************************* 

FOOTER

*************************************************************************************************************************************************************************************************************************************************************************/


  if ( ! function_exists( 'corponotch_pro_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since CorpoNotch Pro 1.0.0
	 */
	function corponotch_pro_site_info() { 
		$copyright = corponotch_pro_theme_option('copyright_text');
        $phone = get_stylesheet_directory_uri() . '/assets/uploads/trial-tribe-phone.png';
        $office = get_stylesheet_directory_uri() . '/assets/uploads/trial-tribe-office.png';
        $instagram = get_stylesheet_directory_uri() . '/assets/uploads/trial-tribe-instagram.png';
        $email = get_stylesheet_directory_uri() . '/assets/uploads/trial-tribe-email.png';
        $youtube = get_stylesheet_directory_uri() . '/assets/uploads/trial-tribe-youtube.png';
		?>
		<div class="site-info">
            <div class="contact-container footer-contact">
                <div class="contact-element">
                    <div class="contact-element-icon">
                        <a href="tel:(817)400-5000">
                            <img src="<?php echo esc_url( $phone ); ?>"> 	                		
                        </a>
                    </div>
                    <div class="contact-element-label">
                        <a href="tel:(817)400-5000">
                            <h3 class="contact-element-label">(817) 400-5000</h3>
                        </a>
                        <a href="tel:(817)400-5000">
                            <li class="call-or-text">Call or Text</li>
                            <li class="call-or-text">Available 24 7 365</li>
                        </a>
                    </div>
                </div>
                <div class="contact-element">
                    <div class="contact-element-icon">
                        <a href="mailto:info@trialtribe.com">
                        <img src="<?php echo esc_url( $email ); ?>"> 	                		
                    </a>
                    </div>
                    <div class="contact-element-label">
                        <a href="mailto:info@trialtribe.com">
                            <h3 class="contact-element-label">Info@TrialTribe.com</h3>
                        </a>
                    </div>
                </div>
                <div class="contact-element">
                    <div class="contact-element-icon">
                        
                        <img src="<?php echo esc_url( $office ); ?>"> 	                		
                        
                    </div>
                    <div class="contact-element-label">
                        <h3 class="contact-element-label-address">600 W. 6th St.</h3>
                        <h3 class="contact-element-label-address">Ste. 400</h3>
                        <h3 class="contact-element-label-address">Fort Worth, TX 76102</h3>
                    </div>
                </div>
            </div>
            <hr class="footer-separator"> 
            <div class="wrapper">
            	<?php if ( ! empty( $copyright ) ) : ?>
	                <div class="copyright">
	                	<p>
	                    	<?php 
	                    	echo corponotch_pro_santize_allow_tags( $copyright ); 
	                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                    	?>
	                    </p>
	                </div><!-- .copyright -->
	            <?php endif; 

	            if ( ! empty( $copyright ) ) : ?>
	                <div class="powered-by">
	                    <?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
			        			'container' => false,
			        			'menu_class' => 'menu nav-menu',
			        			'menu_id' => 'footer-menu',
			        			'fallback_cb' => 'corponotch_pro_menu_fallback_cb',
							) );
						?>
	                </div><!-- .powered-by -->
	            <?php endif; ?>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php }
endif;

/************************************************************************************************************************************************************************************************************************************************************************* 

TOP MENU BAR

*************************************************************************************************************************************************************************************************************************************************************************/


if ( ! function_exists( 'corponotch_pro_top_bar' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since CorpoNotch Pro 1.0.0
	 */
	function corponotch_pro_top_bar() { 
		if ( ! corponotch_pro_theme_option( 'enable_topbar' ) )
			return;

		$address 	= corponotch_pro_theme_option( 'topbar_address' );
		$phone 		= corponotch_pro_theme_option( 'topbar_phone' );
		$email 		= corponotch_pro_theme_option( 'topbar_email' );
		?>
		<div id="top-menu">
            <div class="top-menu-phone-container">
                <a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
                    <?php 
                    echo corponotch_pro_get_svg( array( 'icon' => 'phone-o' ) ); 
                    echo esc_html( $phone ); 
                    ?>
                </a>
            </div>
			<button class="topbar-menu-toggle">
				<div class="top-menu-toggle">
					
					<?php 
					echo corponotch_pro_get_svg( array( 'icon' => 'up', 'class' => 'dropdown-icon' ) );
					echo corponotch_pro_get_svg( array( 'icon' => 'down', 'class' => 'dropdown-icon' ) ); 
					?>
				</div>
			</button>
            
            <div class="wrapper">
                <div class="secondary-menu">
                	<ul class="menu">
                		<?php if ( ! empty( $address ) ) : ?>
	                		<li>
	                			<?php 
                        		echo corponotch_pro_get_svg( array( 'icon' => 'location-o' ) ); 
		                        echo esc_html( $address ); 
		                        ?>
	                		</li>
	                	<?php endif;
	                	
	                	if ( ! empty( $phone ) ) : ?>
	                		<li><a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
	                			<?php 
                        		echo corponotch_pro_get_svg( array( 'icon' => 'phone-o' ) ); 
		                        echo esc_html( $phone ); 
		                        ?>
	                		</a></li>
                		<?php endif;
	                	
	                	if ( ! empty( $email ) ) : ?>
	                		<li><a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
	                			<?php 
                        		echo corponotch_pro_get_svg( array( 'icon' => 'envelope-o' ) ); 
		                        echo esc_html( $email ); 
		                        ?>
	                		</a></li>
	                	<?php endif; ?>
                	</ul>
                </div><!-- .secondary-menu -->

	            <?php if ( corponotch_pro_theme_option( 'show_top_search' ) ) : ?>
		            <div id="top-search" class="social-menu">
	                	<ul>
	                		<li>
	                			<div id="search"><?php get_search_form(); ?></div>
	                			<a href="#" class="search">
	                				<?php echo corponotch_pro_get_svg( array( 'icon' => 'search' ) ); ?>
	            				</a>
	                		</li>
	                	</ul>
	                </div>
	            <?php endif;

	            if ( corponotch_pro_theme_option( 'show_social_menu' ) && has_nav_menu( 'social' ) ) : ?>
	                <div class="social-menu">
	                    <?php  
	                	wp_nav_menu( array(
	                		'theme_location'  	=> 'social',
	                		'container' 		=> false,
	                		'menu_class'      	=> 'menu',
	                		'depth'           	=> 1,
	            			'link_before' 		=> '<span class="screen-reader-text">',
							'link_after' 		=> '</span>',
	                	) );
	                	?>
	                </div><!-- .social-menu -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #top-menu -->
	<?php }
endif;

/************************************************************************************************************************************************************************************************************************************************************************* 

Introduction Section

*************************************************************************************************************************************************************************************************************************************************************************/

if ( ! function_exists( 'corponotch_pro_render_introduction_section' ) ) :
    /**
     * Start introduction section
     *
     * @return string introduction content
     * @since CorpoNotch Pro 1.0.0
     *
     */
     function corponotch_pro_render_introduction_section( $content_details = array() ) {
          $image_align = corponotch_pro_theme_option( 'introduction_align', 'left-align' );
          $read_more = corponotch_pro_theme_option( 'introduction_btn_label', esc_html__( 'Explore Us', 'corponotch-pro' ) );
          $sub_title = corponotch_pro_theme_option( 'introduction_sub_title', '' );
          $introduction_excerpt = corponotch_pro_theme_option( 'introduction_excerpt', 'excerpt' );
  
          if ( empty( $content_details ) )
              return;
  
          ?>
          <div id="introduction" class="page-section relative <?php echo esc_attr( $image_align ); ?>">
              <div class="wrapper">
                  <?php foreach ( $content_details as $content ) : ?>
                      <article class="hentry">
                          <div class="post-wrapper">
                              <div class="entry-container">
                                  <?php if ( ! empty( $content['title'] ) || ! empty( $sub_title )  ) : ?>
                                      <header class="entry-header">
                                          <?php if ( ! empty( $sub_title ) ) : ?>
                                              <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                                          <?php endif;
                                          
                                          if ( ! empty( $content['title'] ) ) : ?>
                                              <h2 class="entry-title introduction-title-landing">
                                                  <a href="<?php echo esc_url( $content['url'] ); ?>">We Care. We Fight. <span style="color: #FFFB00;">We Win.</span></a>
                                              </h2>
                                          <?php endif; ?>
                                      </header>
                                  <?php endif; 
  
                                  if ( 'excerpt' == $introduction_excerpt ) :
                                      if ( ! empty( $content['excerpt'] ) ) : ?>
                                          <div class="entry-content">
                                              <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                          </div><!-- .entry-content -->
                                      <?php endif; ?>
                                      <a class="more-btn" href="<?php echo esc_url( $content['url'] ); ?>">
                                          <?php echo esc_html( $read_more ); ?>
                                      </a>
                                  <?php else : ?>
                                      <div class="entry-content">
                                          <?php 
                                              $full_content = apply_filters('the_content', get_post_field( 'post_content', $content['id'] ) ); 
                                              $full_content = str_replace(']]>', ']]&gt;', $full_content);
                                              echo $full_content;
                                          ?>
                                      </div><!-- .entry-content -->
                                  <?php endif; ?>
                              </div><!-- .entry-container -->
                              <?php if ( ! empty( $content['image'] ) ) : ?>
                                  <div class="featured-image">
                                      <a href="<?php echo esc_url( $content['url'] ) ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                  </div><!-- .featured-image -->
                              <?php endif; ?>
                          </div><!-- .post-wrapper -->
                      </article>
                  <?php endforeach; ?>
              </div><!-- .wrapper -->
          </div><!-- #introduction -->
      <?php 
      }
  endif;