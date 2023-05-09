<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corponotch_pro
 */

get_header(); 
$enable_front_page = corponotch_pro_theme_option( 'enable_front_page' );

if ( ( is_front_page() && $enable_front_page ) || ! is_front_page() ) : ?>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<div class="single-template-wrapper wrapper page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				<?php if(is_page("Contact Us")) : 
					$start_your_case_url = "http://trialtribe.com/start-your-case";
					?>
					<hr>
					<div class="contact-container">
						<div class="contact-element">
							<div class="contact-element-icon">
								<a href="tel:(817)400-5000">
									<svg class="icon icon-phone-o" aria-hidden="true" role="img"> <use href="#icon-phone-o" xlink:href="#icon-phone-o"></use> </svg>	                		
								</a>
							</div>
							<div class="contact-element-label">
								<a href="tel:(817)400-5000">
									<h3>(817) 400-5000</h3>
								</a>
								<li>Call or Text</li>
								<li>Available 24 7 365</li>
							</div>
						</div>
						<div class="contact-element">
							<div class="contact-element-icon">
							<a href="mailto:info@trialtribe.com">
	                			<svg class="icon icon-envelope-o " aria-hidden="true" role="img"> <use href="#icon-envelope-o" xlink:href="#icon-envelope-o"></use> </svg>	                		
							</a>
							</div>
							<div class="contact-element-label">
								<a href="mailto:info@trialtribe.com">
									<h3>info@trialtribe.com</h3>
								</a>
							</div>
						</div>
						<div class="contact-element">
							<div class="contact-element-icon">
								<a href="tel:(817)400-5000">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/> <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/> </svg>	                		
								</a>
							</div>
							<div class="contact-element-label">
								<h3>600 W. 6th St.</h3>
								<h3>Sut. 400</h3>
								<h3>Fort Worth, TX 76102</h3>
							</div>
						</div>
					</div>
					<hr>
					<div class="social-container">
						<h2 class="social-label">Follow Us</h2>
						<div class="social-contact-container">
							<div class="social-contact">
								<a href="https://instagram.com" class="customize-unpreviewable">
									<span class="screen-reader-text">instagram</span>
									<svg class="icon icon-instagram " aria-hidden="true" role="img"> <use href="#icon-instagram" xlink:href="#icon-instagram"></use> </svg>
								</a>
								<h3>trialtribe</h3>
							</div>
							<div class="social-contact">
								<a href="https://instagram.com" class="customize-unpreviewable">
									<span class="screen-reader-text">youtube</span>
									<svg class="icon icon-youtube " aria-hidden="true" role="img"> <use href="#icon-youtube" xlink:href="#icon-youtube"></use> </svg>
								</a>
								<h3>hydetrialtribe</h3>
							</div>
						</div>
					</div>
					<hr>
					<div class="state-container">
						<h2 class="states-header">Find a Personal Injury Attorney By State</h2>
						<hr class="states-break">
						<p class="states-info-text">We can Assist You In Finding Local Counsel If We Do Not Practice In Your State</p>
						<div class="states">
							<div class="state-column">
								<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alabama</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alaska</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arizona</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arkansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> California</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Colorado</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Connecticut</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Delaware</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Florida</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Georgia</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Hawaii</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Idaho</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Illinois</li>
									</a>
								</ul>
							</div>
							<div class="state-column">
							<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Indiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Iowa</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kentucky</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Louisiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maine</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maryland</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Massachusetts</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Michigan</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Minnesota</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Mississippi</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Missouri</li>
									</a>
								</ul>
							</div>
							<div class="state-column">
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nebraska</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nevada</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Hampshire</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Jersey</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Mexico</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New York</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Carolina</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Dakota</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Ohio</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oklahoma</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oregon</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Pennsylvania</li>
								</a>
							</div>
							<div class="state-column">
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Rhode Island</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Carolina</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Dakota</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Tennessee</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Texas</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Utah</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Vermont</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Virginia</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Washington</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> West Virginia</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wisconsin</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wyoming</li>
								</a>
							</div>
						</div>
					</div>	
				<?php
				endif;
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php endif;

get_footer();
