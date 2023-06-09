<?php
/**
 * Client hook
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_add_client_section' ) ) :
    /**
    * Add client section
    *
    *@since CorpoNotch Pro 1.0.0
    */
    function corponotch_pro_add_client_section() {

        // Check if client is enabled on frontpage
        $client_enable = apply_filters( 'corponotch_pro_section_status', 'enable_client', 'client_entire_site' );

        if ( ! $client_enable )
            return false;

        // Get client section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_pro_filter_client_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render client section now.
        corponotch_pro_render_client_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_pro_get_client_section_details' ) ) :
    /**
    * client section details.
    *
    * @since CorpoNotch Pro 1.0.0
    * @param array $input client section details.
    */
    function corponotch_pro_get_client_section_details( $input ) {

        // Content type.
        $client_content_type  = corponotch_pro_theme_option( 'client_content_type' );
        $client_count  = corponotch_pro_theme_option( 'client_count', 5 );
        $content = array();
        switch ( $client_content_type ) {

            case 'custom':
                for ( $i = 1; $i <= $client_count; $i++ ) :
                    $custom['url']          =  corponotch_pro_theme_option( 'client_custom_link_' . $i );
                    $custom['image']        =  corponotch_pro_theme_option( 'client_custom_image_' . $i );
                    $custom['alt']        =  corponotch_pro_theme_option( 'client_custom_text_' . $i );

                    if ( ! empty( $custom['image'] ) )
                        array_push( $content, $custom );
                endfor;
            break;

            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $client_count; $i++ )  :
                    $page_ids[] = corponotch_pro_theme_option( 'client_content_page_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $client_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $client_count; $i++ )  :
                    $post_ids[] = corponotch_pro_theme_option( 'client_content_post_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $client_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            case 'category':
                $cat_id = corponotch_pro_theme_option( 'client_content_category' );
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $client_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts' => true,
                    ); 
            break;

            default:
            break;
        }

        if ( 'custom' !== $client_content_type ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['alt']  = get_the_title();
                    $page_post['url']    = get_the_permalink();
                    $page_post['image']  = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
                    array_push( $content , $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// client section content details.
add_filter( 'corponotch_pro_filter_client_section_details', 'corponotch_pro_get_client_section_details' );


if ( ! function_exists( 'corponotch_pro_render_client_section' ) ) :
  /**
   * Start client section
   *
   * @return string client content
   * @since CorpoNotch Pro 1.0.0
   *
   */
   function corponotch_pro_render_client_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column  = corponotch_pro_theme_option( 'client_column', 'column-5' );
        $title = corponotch_pro_theme_option( 'client_title', '' );
        $sub_title = corponotch_pro_theme_option( 'client_sub_title', '' );
        ?>
    	<div class="page-section client-section relative">
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
                
                <div class="section-content <?php echo esc_attr( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <div class="client">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['alt'] ); ?>">
                                        </a>
                                    <?php endif; ?> 
                                </div><!-- .client -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #client -->
    <?php 
    }
endif;