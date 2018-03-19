<?php
/**
 * The Page Sidebar containing the widget area.
 *
 * @package AOL
 * @author Capstone Group 12
 * @link 
 */

$sidebar = false;

// Category -----------------------------------------------
$category = get_query_var( 'portfolio-types' );
$cat_sidebar = 'portfolio-cat-'. $category;

if( is_active_sidebar( $cat_sidebar ) ){
	$sidebar = $cat_sidebar;
}

// Blog ---------------------------------------------------
if( ! $sidebar ){
	$portfolio_page_id = aol_opts_get( 'portfolio-page' );
	$sidebars = aol_opts_get( 'sidebars' );
	$sidebar = get_post_meta($portfolio_page_id, 'aol-post-sidebar', true);
	$sidebar = $sidebars[$sidebar];
}

?>

<?php if( aol_sidebar_classes() ): ?>
<div class="sidebar four columns">
	<div class="widget-area clearfix <?php aol_opts_show('sidebar-lines'); ?>">
		<?php 
			if ( ! dynamic_sidebar( $sidebar ) ){ 
				aol_nosidebar(); 
			}
		?>
	</div>
</div>
<?php endif;

// Omit Closing PHP Tags