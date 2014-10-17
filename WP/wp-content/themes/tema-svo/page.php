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
				
	</div>
	<aside class="col-md-4 sidebar direita">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div><!-- #primary-sidebar -->
					<?php endif; ?>
				
	</aside>	
</div><!--row principal-->
</div><!--container pagina-->

<?php
get_footer();
