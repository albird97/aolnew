<?php
/**
 * The search template file.
 *
 * @package AOL
 * @author Capstone Group 12
 * @link 
 */

get_header();

$translate['search-title'] = aol_opts_get('translate') ? aol_opts_get('translate-search-title','Ooops...') : __('Ooops...','aol');
$translate['search-subtitle'] = aol_opts_get('translate') ? aol_opts_get('translate-search-subtitle','No results found for:') : __('No results found for:','aol');

$translate['published'] 	= aol_opts_get('translate') ? aol_opts_get('translate-published','Published by') : __('Published by','aol');
$translate['at'] 			= aol_opts_get('translate') ? aol_opts_get('translate-at','at') : __('at','aol');
$translate['readmore'] 		= aol_opts_get('translate') ? aol_opts_get('translate-readmore','Read more') : __('Read more','aol');
?>

<div id="Content">
	<div class="content_wrapper clearfix">

	
		<!-- .sections_group -->
		<div class="sections_group">
		
			<div class="section">
				<div class="section_wrapper clearfix">
				
					<?php if( have_posts() && trim( $_GET['s'] ) ): ?>
					
						<div class="column one column_blog">	
							<div class="blog_wrapper isotope_wrapper">
				
								<div class="posts_group classic">
									<?php
										while ( have_posts() ):
											the_post();
											?>
											<div id="post-<?php the_ID(); ?>" <?php post_class( array('post-item', 'clearfix', 'no-img') ); ?>>
												
												<div class="post-desc-wrapper">
													<div class="post-desc">
													
														<?php if( aol_opts_get( 'blog-meta' ) ): ?>
															<div class="post-meta clearfix">
																<div class="author-date">
																	<span class="author"><span><?php echo $translate['published']; ?> </span><i class="icon-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a></span>
																	<span class="date"><span><?php echo $translate['at']; ?> </span><i class="icon-clock"></i> <?php echo get_the_date(); ?></span>
																</div>
															</div>
														<?php  endif; ?>
														
													
														<div class="post-title">
															<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
														</div>
														
														<div class="post-excerpt">
															<?php the_excerpt(); ?>
														</div>
		
														<div class="post-footer">
															<div class="post-links">
																<i class="icon-doc-text"></i> <a href="<?php the_permalink(); ?>" class="post-more"><?php echo $translate['readmore']; ?></a>
															</div>
														</div>
							
													</div>
												</div>
											</div>
											<?php
										endwhile;
									?>
								</div>
						
								<?php	
									// pagination
									if(function_exists( 'aol_pagination' )):
										echo aol_pagination();
									else:
										?>
											<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'betheme')) ?></div>
											<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'betheme')) ?></div>
										<?php
									endif;
								?>
						
							</div>
						</div>
						
					<?php else: ?>
					
						<div class="column one search-not-found">
						
							<div class="snf-pic">
								<i class="themecolor <?php aol_opts_show( 'error404-icon', 'icon-traffic-cone' ); ?>"></i>
							</div>
							
							<div class="snf-desc">
								<h2><?php echo $translate['search-title']; ?></h2>
								<h4><?php echo $translate['search-subtitle'] .' '. esc_html( $_GET['s'] ); ?></h4>
							</div>	
										
						</div>	
						
					<?php endif; ?>
					
				</div>
			</div>
			
		</div>
		
		
		<!-- .four-columns - sidebar -->
		<?php if( is_active_sidebar( 'mfn-search' ) ):  ?>
			<div class="sidebar four columns">
				<div class="widget-area clearfix <?php aol_opts_show( 'sidebar-lines' ); ?>">
					<?php dynamic_sidebar( 'mfn-search' ); ?>
				</div>
			</div>
		<?php endif; ?>
		

	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags