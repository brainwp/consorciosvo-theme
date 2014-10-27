<?php
/**
 *
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<div class="col-md-12 esquerda"><!--esquerda-->
				<h1 class="page-title"><?php _e( 'Not Found', 'odin' ); ?></h1>
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'odin' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
	</div>	
</div><!--row principal-->
</div><!--container pagina-->
<?php
get_footer();
