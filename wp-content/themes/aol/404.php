<?php
/**
 * 404 error page.
 *
 * @package AOL
 * @author Capstone Group 12
 * @link 
 */

$translate['404-title'] = aol_opts_get('translate') ? aol_opts_get('translate-404-title','Ooops... Error 404') : __('Ooops... Error 404','betheme');
$translate['404-subtitle'] = aol_opts_get('translate') ? aol_opts_get('translate-404-subtitle','We`re sorry, but the page you are looking for doesn`t exist.') : __('We are sorry, but the page you are looking for does not exist.','betheme');
$translate['404-text'] = aol_opts_get('translate') ? aol_opts_get('translate-404-text','Please check entered address and try again <em>or</em>') : __('Please check entered address and try again or ','betheme');
$translate['404-btn'] = aol_opts_get('translate') ? aol_opts_get('translate-404-btn','go to homepage') : __('go to homepage','betheme');
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
<?php wp_head();?>
</head>

<?php 
	$customID = aol_opts_get( 'error404-page' );
	$body_class = '';
	if( $customID ) $body_class .= 'custom-404';
?>

<!-- body -->
<body <?php body_class( $body_class ); ?>>
	
	<?php if( $customID ): ?>
		
		<div id="Content">
			<div class="content_wrapper clearfix">
		
				<!-- .sections_group -->
				<div class="sections_group">
					<?php 
						aol_builder_print( $customID, true );	// Content Builder & WordPress Editor Content
					?>
				</div>
				
				<!-- .four-columns - sidebar -->
				<?php get_sidebar(); ?>
		
			</div>
		</div>
	
	<?php else: ?>
	
		<div id="Error_404">
			<div class="container">
				<div class="column one">
					<div class="error_pic">
						<i class="<?php aol_opts_show('error404-icon','icon-traffic-cone'); ?>"></i>
					</div>
					<div class="error_desk">
						<h2><?php echo $translate['404-title']; ?></h2>
						<h4><?php echo $translate['404-subtitle']; ?></h4>
						<p><span class="check"><?php echo $translate['404-text']; ?></span> <a class="button button_filled" href="<?php echo site_url(); ?>"><?php echo $translate['404-btn']; ?></a></p>
					</div>				
				</div>
			</div>
		</div>
		
	<?php endif; ?>


	<!-- wp_footer() -->
	<?php wp_footer(); ?>

</body>
</html>