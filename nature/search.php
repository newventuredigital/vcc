<?php
/**
 * @package Nature WP
*/

get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<h2 class="search-title"><?php printf( __( 'Search results for: %s', 'nature' ), '<span>' . get_search_query() . '</span>' ); ?></h2><hr>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article class="post">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php _e( 'By ', 'nature' ) . the_author(); ?>
							   <?php _e( 'on ', 'nature' ) . the_time( 'l, F jS, Y' ); ?>
							   <?php _e( 'in ', 'nature' ) . the_category( ', ' ); ?>
							   | <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
							</p>

						</article>
						<?php the_excerpt(); ?>
						<hr>
					<?php endwhile; else : ?>
					<div class="page-header">
						<h1><?php echo _e ( 'Sorry, we didn\'t find anything!' , 'nature' ); ?></h1>
						<h2><?php echo _e ( 'You can try again' , 'nature' ); ?></h2>
						<?php get_search_form();?>
					</div>

				<?php endif;?>
				 	<div class="blog-pagination">
				<?php
					if ( function_exists('vb_pagination') ) {
						vb_pagination();
						}
				?>
				</div>
			</div>
			<?php get_sidebar( 'blog'); ?>
		</div>
	</div>
</div>

<?php get_footer();?>
