<?php
/**sidebar-home
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div id="secondary" class="aside col-md-4 sidebar direita <?php echo odin_sidebar_classes(); ?>" role="complementary">
		
		<?php
		if ( ! dynamic_sidebar( 'barra-biblioteca' ) ) {
			the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
			the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
			the_widget( 'WP_Widget_Tag_Cloud' );
		}
	?>
</div><!-- #secondary -->