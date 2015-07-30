<?php
/**
 * @package Nature WP
*/
get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php if ( have_posts() ) : while (have_posts() ) : the_post() ; ?>
				<div class="row blog-medium wow fadeIn" data-wow-duration="1.5s">
					<div class="col-sm-5">
						<div class="effect-zoom hover-effects">
							<div class="item img">
								<figure>
								<?php
								    if ( has_post_thumbnail() ) {
								    		the_post_thumbnail ( 'medium-blog' );
											} else {
									     echo '<img src="' . of_get_option('option_placeholder') . '" alt="no image"/>';
								    }
								?>
								<div class="overlay-zoom">
									<a href="<?php the_permalink(); ?>" class="expand-small" title="<?php echo the_title(); ?>">
										<i class="fa fa-share-square fa-4x"></i>
									</a>
									<div class="close-overlay hidden">x</div>
								</div>
							</figure>
						</div><!-- item img -->
					</div><!-- effect-zoom -->
				</div><!-- col-sm-5 -->
				<div class="col-sm-7">
					<article>
						<header>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
						</header>
						<ul class="blog-medium-below">
							<li><i class="fa fa-calendar-o"></i> <?php echo the_time ( 'M j, Y' ) ;?> &nbsp;
							<i class="fa fa-folder-open-o"></i> <?php echo _e( 'Category: ', 'nature' ); ?> <?php the_category( ', ' ); ?>
							  &nbsp;<i class="fa fa-comments-o"></i> Comments: <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
							</li>
						</ul>
						<p><?php the_excerpt();?> </p>
						<a class="ghost-dark" href="<?php the_permalink(); ?>">Read More</a>
					</article>
					<div class="clear bottom"></div>
				</div><!-- col-sm-7 -->
			</div><!-- blog-medium  -->
		  	<?php endwhile; ?>
	      	<?php endif; ?>
		      	<div class="blog-pagination">
				<?php
					if ( function_exists('vb_pagination') ) {
						vb_pagination();
						}
				?>
				</div>
			</div><!-- col-lg-8 -->
			<?php get_sidebar('sidebar-blog');?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
