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
			// WC < 2.7 backward compatibility
			if( version_compare( WC_VERSION, '2.7', '<' ) ){
				$shop_id = woocommerce_get_page_id( 'shop' );
			} else {
				$shop_id = wc_get_page_id( 'shop' );
			}
			
			// Featured Image -----------
			$header_style = '';

			if( aol_opts_get('img-subheader-attachment') == 'parallax' ){
				
				if( aol_opts_get( 'parallax' ) == 'stellar' ){
					$header_style .= ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style .= ' class="bg-parallax" data-enllax-ratio="0.3"';
				}
		
			}
		?>
		
		<?php 
			if( aol_header_style( true ) == 'header-below' ){
				if( is_shop() || ( aol_opts_get('shop-slider') == 'all' ) ){
					echo aol_slider( $shop_id );
				}
			}
		?>
		
		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>
	
			<!-- #Header -->
			<header id="Header">
				<?php if( aol_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>	
				<?php 
					if( aol_header_style( true ) != 'header-below' ){
						if( is_shop() || ( aol_opts_get('shop-slider') == 'all' ) ){
							echo aol_slider( $shop_id );
						}
					}
				?>
			</header>
			
			<?php 
				add_filter( 'woocommerce_show_page_title', create_function( false, 'return false;' ) );
				
				
				$subheader_advanced = aol_opts_get( 'subheader-advanced' );
				
				$subheader_style = '';
					
				if( aol_opts_get( 'subheader-padding' ) ){
					$subheader_style .= 'padding:'. aol_opts_get( 'subheader-padding' ) .';';
				}
				
					
				if( ! aol_slider_isset( $shop_id ) || is_product() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
					
					// Subheader | Options
					$subheader_options = aol_opts_get( 'subheader' );

					if( is_array( $subheader_options ) && isset( $subheader_options['hide-subheader'] ) ){
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
					if( is_array( $subheader_options ) && isset( $subheader_options['hide-breadcrumbs'] ) ){
						$breadcrumbs_show = false;
					} else {
						$breadcrumbs_show = true;
					}

					
					// Subheader | Print
					if( $subheader_show ){
						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';
																
									// Title
									if( $title_show ){
										
										$title_tag = aol_opts_get( 'subheader-title-tag', 'h1' );
										
										// Single Product can't use h1
										if( is_product() && $title_tag == 'h1' ) $title_tag = 'h2';
										
										echo '<'. $title_tag .' class="title">';
										
											if( is_product() && aol_opts_get('shop-product-title') ){
												the_title();											
											} else {
												woocommerce_page_title();
											}
										
										echo '</'. $title_tag .'>';
										
									}

									// Breadcrumbs
									if( $breadcrumbs_show ){
										
										$home = aol_opts_get('translate') ? aol_opts_get('translate-home','Home') : __('Home','betheme');
										$woo_crumbs_args = apply_filters( 'woocommerce_breadcrumb_defaults', array(
											'delimiter'   => false,
											'wrap_before' => '<ul class="breadcrumbs woocommerce-breadcrumb">',
											'wrap_after'  => '</ul>',
											'before'      => '<li>',
											'after'       => '<span><i class="icon-right-open"></i></span></li>',
											'home'        => $home,
										) );
										
										woocommerce_breadcrumb( $woo_crumbs_args );
										
									}
			
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					
				}
			?>
			
		</div>
		
		<?php do_action( 'aol_hook_content_before' );
		
// Omit Closing PHP Tags