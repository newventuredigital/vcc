<?php
/*
Template Name: Blog Masonry
*/
get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container masonry-container'); ?>>
	<div class="row">
		<div class="effect-zoom hover-effects">
			<div id="content" class="masonry">
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
				<div class="item">
					<div class="img">
						<figure>
							<?php
							    if ( has_post_thumbnail() ) {
							    	the_post_thumbnail('masonry');
							    } else {
								    echo '<img src="http://themes.pixelcake.com.br/nature/img/no-image.jpg" alt="no image"/>';
							    }
							?>
							<div class="overlay-zoom">
								<a href="<?php the_permalink(); ?>" class="expand-small" title="<?php echo ('title'); ?>">
									<i class="fa fa-share-square fa-4x"></i>
								</a>
								<div class="close-overlay hidden">x</div>
							</div>
						</figure>
					</div><!-- Div class img -->
					<article>
						<header>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
						</header>
						<ul class="blog-medium-below">
							<li><i class="fa fa-folder-open-o"></i> <?php echo __('Category: ', 'nature'); ?> <?php the_category( ', ' ); ?></li>
						</ul>
						<?php the_excerpt();?>
						<a class="ghost-dark left" href="<?php the_permalink(); ?>">Read More</a>

					</article>
				</div><!-- item ends  -->
				<?php endwhile; endif; ?>
			</div><!-- # content -->
		</div><!-- effect zoom -->
      	<div class="blog-pagination">
			<?php
				if ( function_exists('vb_pagination') ) {
					vb_pagination($the_query);
					}
			?>
      	</div>
	</div><!-- row -->
</div><!-- container -->
<?php get_footer(); ?>
