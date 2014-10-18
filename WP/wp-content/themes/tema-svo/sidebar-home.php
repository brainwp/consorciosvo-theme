<?php
/**sidebar-home
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div id="secondary" class="aside col-md-4 sidebar direita <?php echo odin_sidebar_classes(); ?>" role="complementary">
		
		<section id="participe" class="modulo-sidebar">
						<h2>Participe</h2>
						<div id="contatos"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/face.png'?>"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/email.png'?>"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/skype.png'?>"></div>
						<div class="clearfix"></div>
						<form>
						    <div class="form-group">
						        <label for="inputEmail">Email</label>
						        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
						    </div>
						    <div class="form-group">
						        <label for="inputText">Mensagem</label>
						        <textarea type="text" class="form-control" id="inputText" placeholder="Mensagem"></textarea>
						    </div>
						    <div class="checkbox">
						        <label><input type="checkbox"> Desejo receber atualizações</label>
						    </div>
						    <button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</section><?php
		if ( ! dynamic_sidebar( 'barra-principal' ) ) {
			the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
			the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
			the_widget( 'WP_Widget_Tag_Cloud' );
		}
	?>
</div><!-- #secondary -->