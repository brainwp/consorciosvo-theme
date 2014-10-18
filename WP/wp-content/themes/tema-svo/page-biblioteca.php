<?php
/**
 * The template for displaying all bibliotecas pages.
 *
 * * Template Name: Biblioteca
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
<?php the_breadcrumb(); ?>

	<div class="col-md-8 esquerda"><!--esquerda-->
				<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();

									// Include the page content template.
									get_template_part( 'content', 'page' );

									// If comments are open or we have at least one comment, load up the comment template.
								endwhile;
							?>
	</div>
	<?php get_sidebar( 'biblioteca' ); ?>
	

</div><!--row principal-->
</div><!--container pagina-->

<?php
get_footer();
