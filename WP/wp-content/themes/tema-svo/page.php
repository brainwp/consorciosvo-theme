<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<div class="col-md-8 esquerda"><!--esquerda-->
				<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();

									// Include the page content template.
									get_template_part( 'content', 'page' );

									
								endwhile;
							?>
	</div>
	<?php get_sidebar( 'home' ); ?>
	

</div><!--row principal-->
</div><!--container pagina-->

<?php
get_footer();
