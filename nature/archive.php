<?php
/**
 * @package Nature WP
*/
get_header(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'container'); ?>>
			<div class="row">
				<div class="col-md-8">
				<div class="page-header">
					<h2 class="search-title">
					<?php if ( have_posts() ) :

					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'nature' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'nature' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'nature' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'nature' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'nature' ) ) . '</span>' );
					else :
						_e( 'Archives', 'nature' );
					endif;

					?></h2>
				</div>
					<?php while ( have_posts() ) : the_post(); ?>
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
					<?php endwhile; ?>
					<?php endif;?>
					</div>
				<?php get_sidebar( 'blog'); ?>
			</div>
		</div>

<?php get_footer();?>
