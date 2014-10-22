<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * * Template Name: noticias
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<div class="col-md-11 esquerda">
			<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
			
			<?php
			
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'loop', 'destaques');
						get_template_part( 'loop', 'noticia');

					endwhile;

					// Post navigation.

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</div>


	</div><!--row principal-->
	</div><!--container pagina-->

	<?php
	get_footer();
		