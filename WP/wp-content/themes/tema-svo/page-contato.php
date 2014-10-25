<?php
/**
 * The template for displaying all bibliotecas pages.
 *
 * * Template Name: Contato
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
								get_template_part( 'content', 'contato' );

								
							endwhile;
						?>
		</div>	
		<?php get_sidebar( 'contato' ); ?>
		
	</div><!--row principal-->
	</div><!--container pagina-->

	<?php
	get_footer();
	
