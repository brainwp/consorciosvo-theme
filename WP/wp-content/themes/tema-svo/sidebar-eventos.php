<?php
/**sidebar-home
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div id="secondary" class="aside col-md-4 sidebar direita <?php echo odin_sidebar_classes(); ?>" role="complementary">
					<section id="noticias-home" class="modulo-sidebar">
						<h2>Outros eventos</h2>
						<?php get_template_part("loop", "agenda")?>
					</section>
</div><!-- #secondary -->