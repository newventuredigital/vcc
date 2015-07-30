<?php
/**
 * @package Nature WP
*/
get_header();?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>
					<header>
						<h2><?php the_title()?></h2>
					</header>

					<?php the_content();?>

				</article>
				<div class="clear bottom"></div>
				<hr>
				 <?php comments_template(); ?>
			</div><!-- col-md-8 -->
		<?php endwhile; endif ?>

		<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php get_footer();?>
