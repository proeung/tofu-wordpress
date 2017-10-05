<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tofu
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (get_post_type()): ?>
					<?php get_template_part( 'template-parts/content/content-', get_post_type( get_the_ID()) ); ?>
				<?php else: ?>
					<?php get_template_part( 'template-parts/content/content-', get_post_format() ); ?>
				<?php endif; ?>

				<?php the_post_navigation(); ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
