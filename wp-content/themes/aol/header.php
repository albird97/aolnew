<?php
/**
 * The Header for our theme.
 *
 * @package AOL
 * @author Capstone Group 12
 * @link 
 */
?><!DOCTYPE html>
<?php 
	if( $_GET && key_exists('aol-rtl', $_GET) ):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html class="no-js<?php echo aol_user_os(); ?>" <?php language_attributes(); ?><?php aol_tag_schema(); ?>>
<?php endif; ?>

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php 
	if( aol_opts_get('responsive') ){
		if( aol_opts_get('responsive-zoom') ){
			echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
		} else {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
		}
		 
	}
?>

<?php do_action('wp_seo'); ?>

<link rel="shortcut icon" href="<?php aol_opts_show( 'favicon-img', THEME_URI .'/images/favicon2.ico' ); ?>" />	
<?php if( aol_opts_get('apple-touch-icon') ): ?>
<link rel="apple-touch-icon" href="<?php aol_opts_show( 'apple-touch-icon' ); ?>" />
<?php endif; ?>	

<!-- wp_head() -->
<?php wp_head(); ?>
</head>

<!-- body -->
<body <?php body_class(); ?>>
	
	<?php do_action( 'aol_hook_top' ); ?>

	<?php get_template_part( 'includes/header', 'sliding-area' ); ?>
	
	<?php if( aol_header_style( true ) == 'header-creative' ) get_template_part( 'includes/header', 'creative' ); ?>
	
	<!-- #Wrapper -->
	<div id="Wrapper">
	
		<?php 
			// Featured Image | Parallax ----------
			$header_style = '';
				
			if( aol_opts_get( 'img-subheader-attachment' ) == 'parallax' ){
				
				if( aol_opts_get( 'parallax' ) == 'stellar' ){
					$header_style = ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style = ' class="bg-parallax" data-enllax-ratio="0.3"';
				}
				
			}
		?>
		
		<?php if( aol_header_style( true ) == 'header-below' ) echo aol_slider(); ?>

		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>
	
			<!-- #Header -->
			<header id="Header">
				<?php if( aol_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>	
				<?php if( aol_header_style( true ) != 'header-below' ) echo aol_slider(); ?>
			</header>
				
			<?php 
				if( ( aol_opts_get('subheader') != 'all' ) && 
					( ! get_post_meta( mfn_ID(), 'aol-post-hide-title', true ) ) &&
					( get_post_meta( mfn_ID(), 'aol-post-template', true ) != 'intro' )	){

					
					$subheader_advanced = aol_opts_get( 'subheader-advanced' );
					
					$subheader_style = '';
					
					if( aol_opts_get( 'subheader-padding' ) ){
						$subheader_style .= 'padding:'. aol_opts_get( 'subheader-padding' ) .';';
					}				
					
					
					if( is_search() ){
						// Page title -------------------------
						
						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';

									if( trim( $_GET['s'] ) ){
										global $wp_query;
										$total_results = $wp_query->found_posts;
									} else {
										$total_results = 0;
									}

									$translate['search-results'] = aol_opts_get('translate') ? aol_opts_get('translate-search-results','results found for:') : __('results found for:','betheme');								
									echo '<h1 class="title">'. $total_results .' '. $translate['search-results'] .' '. esc_html( $_GET['s'] ) .'</h1>';
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
						
						
					} elseif( ! aol_slider_isset() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
						// Page title -------------------------
						
						
						// Subheader | Options
						$subheader_options = aol_opts_get( 'subheader' );


						if( is_home() && ! get_option( 'page_for_posts' ) && ! aol_opts_get( 'blog-page' ) ){
							$subheader_show = false;
						} elseif( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-subheader' ] ) ){
							$subheader_show = false;
						} elseif( get_post_meta( mfn_ID(), 'aol-post-hide-title', true ) ){
							$subheader_show = false;
						} else {
							$subheader_show = true;
						}
						
						
						// title
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-title' ] ) ){
							$title_show = false;
						} else {
							$title_show = true;
						}
						
						
						// breadcrumbs
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-breadcrumbs' ] ) ){
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}
						
						if( is_array( $subheader_advanced ) && isset( $subheader_advanced[ 'breadcrumbs-link' ] ) ){
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}
						
						
						// Subheader | Print
						if( $subheader_show ){
							echo '<div id="Subheader" style="'. $subheader_style .'">';
								echo '<div class="container">';
									echo '<div class="column one">';
										
										// Title
										if( $title_show ){
											$title_tag = aol_opts_get( 'subheader-title-tag', 'h1' );
											echo '<'. $title_tag .' class="title">'. mfn_page_title() .'</'. $title_tag .'>';
										}
										
										// Breadcrumbs
										if( $breadcrumbs_show ){
											mfn_breadcrumbs( $breadcrumbs_link );
										}
										
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						
					}
					
					
				}
			?>
		
		</div>
		
		<?php 
			// Single Post | Template: Intro
			if( get_post_meta( mfn_ID(), 'aol-post-template', true ) == 'intro' ){
				get_template_part( 'includes/header', 'single-intro' );
			}
		?>
		
		<?php do_action( 'aol_hook_content_before' );
		
// Omit Closing PHP Tags