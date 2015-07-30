<?php
/*
Template Name: Blog Large
*/
get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid '); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					'post_type'	     => 'post',
					'posts_per_page' => 10,
					'paged' => $paged
					);
					$the_query = new WP_Query ( $args );
				?>
				<?php if ( have_posts() ) : while ($the_query->have_posts() ) : $the_query->the_post() ; ?>
				<div class="blog-large wow fadeIn" data-wow-duration="1.5s">
						<div class="effect-zoom hover-effects">
							<div class="item img">
								<figure>
								<?php
								    if ( has_post_thumbnail() ) {
								    	the_post_thumbnail( 'large-blog' );
								    } else {
									    echo '<img src="http://themes.pixelcake.com.br/nature/img/no-image.jpg" alt="no image"/>';
								    }
								?>
								<div class="overlay-zoom">
									<a href="<?php the_permalink(); ?>" class="expand-small" title="<?php the_title(); ?>">
										<i class="fa fa-share-square fa-4x"></i>
									</a>
									<div class="close-overlay hidden">x</div>
								</div>
							</figure>
						</div><!-- item img -->
					</div><!-- effect-zoom -->
				<div class="clear"></div>
					<article>
						<header>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
						</header>
						<ul class="blog-medium-below">
							<li><i class="fa fa-calendar-o"></i> <?php echo the_time ( 'M j, Y' ) ;?> &nbsp;
							<i class="fa fa-folder-open-o"></i> <?php echo __( 'Category: ', 'nature' ); ?> <?php the_category( ', ' ); ?>
							  &nbsp;Comments: <a href="<?php comments_link(); ?>"><?php comments_number(); ?> <i class="fa fa-comments-o"></i></a>
							</li>
						</ul>
						<p><?php the_excerpt();?> </p>
						<a class="ghost-dark" href="<?php the_permalink(); ?>">Read More</a>
					</article>

			</div><!-- blog  -->
		  	<?php endwhile; ?>
	      	<?php endif; ?>
		      	<div class="blog-pagination">
				<?php
					if ( function_exists('vb_pagination') ) {
						vb_pagination($the_query);
						}
				?>
				</div>
			</div><!-- col-lg-8 -->
			<?php get_sidebar('sidebar-blog');?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
