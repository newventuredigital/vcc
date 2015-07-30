<?php
/**
 * @package Nature WP
*/

get_header();?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1><?php bloginfo('name'); ?></h1>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ; ?>
					<div class="page-header">
						<?php the_content(); ?>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
			</div>
		<?php get_sidebar('sidebar-blog');?>
	</div>
</div>
 <?php get_footer();?>
