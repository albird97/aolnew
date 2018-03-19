<?php
/**
 * Hooks
 *
 * @package AOL
 * @author Capstone Group 12
 * @link 
 */


/* ---------------------------------------------------------------------------
 * Hook | Top
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'aol_hook_top' ) )
{
	function aol_hook_top()
	{
		echo '<!-- aol_hook_top -->';
			echo do_shortcode( aol_opts_get( 'hook-top' ) );
		echo '<!-- aol_hook_top -->';
	}
}
add_action( 'aol_hook_top', 'aol_hook_top' );


/* ---------------------------------------------------------------------------
 * Hook | Content before
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'aol_hook_content_before' ) )
{
	function aol_hook_content_before()
	{
		echo '<!-- aol_hook_content_before -->';
			echo do_shortcode( aol_opts_get( 'hook-content-before' ) );
		echo '<!-- aol_hook_content_before -->';
	}
}
add_action( 'aol_hook_content_before', 'aol_hook_content_before' );


/* ---------------------------------------------------------------------------
 * Hook | Content after
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'aol_hook_content_after' ) )
{
	function aol_hook_content_after()
	{
		echo '<!-- aol_hook_content_after -->';
			echo do_shortcode( aol_opts_get( 'hook-content-after' ) );
		echo '<!-- aol_hook_content_after -->';
	}
}
add_action( 'aol_hook_content_after', 'aol_hook_content_after' );


/* ---------------------------------------------------------------------------
 * Hook | Bottom
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'aol_hook_bottom' ) )
{
	function aol_hook_bottom()
	{
		echo '<!-- aol_hook_bottom -->';
		echo do_shortcode( aol_opts_get( 'hook-bottom' ) );
		echo '<!-- aol_hook_bottom -->';
	}
}
add_action( 'aol_hook_bottom', 'aol_hook_bottom' );
