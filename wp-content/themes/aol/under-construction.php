<?php
/**
 * Template Name: Under Construction
 *
 * @package AOL
 * @author Capstone Group 12
 */
?><!DOCTYPE html>
<html class="no-js<?php echo aol_user_os(); ?>" <?php language_attributes(); ?>>

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if( aol_opts_get('responsive') ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'; ?>

<?php do_action('wp_seo'); ?>

<link rel="shortcut icon" href="<?php aol_opts_show('favicon-img',THEME_URI .'/images/favicon2.ico'); ?>" type="image/x-icon" />	

<!-- wp_head() -->
<?php wp_head(); ?>
</head>

<?php 
	$translate['days'] 		= aol_opts_get('translate') ? aol_opts_get('translate-days','days') : __('days','betheme');
	$translate['hours'] 	= aol_opts_get('translate') ? aol_opts_get('translate-hours','hours') : __('hours','betheme');
	$translate['minutes'] 	= aol_opts_get('translate') ? aol_opts_get('translate-minutes','minutes') : __('minutes','betheme');
	$translate['seconds']	= aol_opts_get('translate') ? aol_opts_get('translate-seconds','seconds') : __('seconds','betheme');
	
	$customID 	= aol_opts_get('construction-page');
	$body_class = 'under-construction';
	if( $customID ) $body_class .= ' custom-uc';
?>

<!-- body -->
<body <?php body_class( $body_class ); ?>>

	<!-- #Content -->
	<div id="Content">
		<div class="content_wrapper clearfix">
		
			<?php if( $customID ): ?>

				<!-- .sections_group -->
				<div class="sections_group">
					<?php 
						aol_builder_print( $customID, true );	// Content Builder & WordPress Editor Content
					?>
				</div>
			
			<?php else: ?>
	
				<!-- .sections_group -->
				<div class="sections_group">
				
					<div class="section center section-uc-1">
						<div class="section_wrapper clearfix">
							<div class="items_group clearfix">
								<div class="column one column_column">
									<?php 
										$logo_src = aol_opts_get( 'logo-img', THEME_URI .'/images/logo/logo.png' );
										echo '<a id="logo" href="'. get_home_url() .'" title="'. get_bloginfo( 'name' ) .'">';
											echo '<img class="scale-with-grid" src="'. $logo_src .'" alt="'. get_bloginfo( 'name' ) .'" />';
										echo '</a>';
									?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="section section-border-top section-uc-2">
						<div class="section_wrapper clearfix">
							<div class="items_group clearfix">
							
								<div class="column one column_fancy_heading">
									<div class="fancy_heading fancy_heading_icon">
										<div data-anim-type="bounceIn" class="animate bounceIn">
											<span class="icon_top"><i class=" icon-clock"></i></span>
											<h2><?php aol_opts_show('construction-title'); ?></h2>
											<div class="inside">
												<span class="big"><?php aol_opts_show('construction-text'); ?></span>
											</div>
										</div>
									</div>
								</div>
								
								<?php if( aol_opts_get('construction-date') ): ?>
								
									<div class="downcount" data-date="<?php aol_opts_show('construction-date'); ?>" data-offset="<?php aol_opts_show('construction-offset'); ?>">
										<div class="column one-fourth column_quick_fact">
											<div class="quick_fact">
												<div data-anim-type="zoomIn" class="animate zoomIn">
													<div class="number-wrapper">
														<div class="number days">00</div>
													</div>
													<h3 class="title"><?php echo $translate['days']; ?></h3>
													<hr class="hr_narrow">
												</div>
											</div>
										</div>
										<div class="column one-fourth column_quick_fact">
											<div class="quick_fact">
												<div data-anim-type="zoomIn" class="animate zoomIn">
													<div class="number-wrapper">
														<div class="number hours">00</div>
													</div>
													<h3 class="title"><?php echo $translate['hours']; ?></h3>
													<hr class="hr_narrow">
												</div>
											</div>
										</div>
										<div class="column one-fourth column_quick_fact">
											<div class="quick_fact">
												<div data-anim-type="zoomIn" class="animate zoomIn">
													<div class="number-wrapper">
														<div class="number minutes">00</div>
													</div>
													<h3 class="title"><?php echo $translate['minutes']; ?></h3>
													<hr class="hr_narrow">
												</div>
											</div>
										</div>
										<div class="column one-fourth column_quick_fact">
											<div class="quick_fact">
												<div data-anim-type="zoomIn" class="animate zoomIn">
													<div class="number-wrapper">
														<div class="number seconds">00</div>
													</div>
													<h3 class="title"><?php echo $translate['seconds']; ?></h3>
													<hr class="hr_narrow">
												</div>
											</div>
										</div>
									</div>
									
								<?php endif; ?>
								
							</div>
						</div>
					</div>
					
					<div class="section section-border-top section-uc-3">
						<div class="section_wrapper clearfix">
							<div class="items_group clearfix">
								<div class="column one-fourth column_column"></div>
								<div class="column one-second column_column">
									<div data-anim-type="fadeInUpLarge" class="animate fadeInUpLarge">
										<?php echo do_shortcode( aol_opts_get('construction-contact') ); ?>
									</div>
								</div>
								<div class="column one-fourth column_column"></div>
							</div>
						</div>
					</div>
	
				</div>
				
			<?php endif; ?>
	
		</div>
	</div>

<!-- wp_footer() -->
<?php wp_footer(); ?>

</body>
</html>