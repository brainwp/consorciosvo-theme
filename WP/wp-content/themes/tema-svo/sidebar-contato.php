<?php
/**sidebar-home
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php $odin_general_opts = get_option( 'odin_social' );
	
?>
<div id="secondary" class="aside col-md-4 sidebar direita " role="complementary">
					
					<section id="participe" class="modulo-sidebar">
						<h2>Participe</h2>
						<div id="contatos">
							<a target=_blank  href="<?php 
								if (isset($odin_general_opts['facebook'])):
									echo $odin_general_opts['facebook'];
									endif;?>">
								<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/face.png'?>">
							</a>
							<a target=_blank  href="mailto:<?php 
								if (isset($odin_general_opts['email'])):
									echo $odin_general_opts['email'];
									endif;?>">
								<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/email.png'?>">
							</a>
							<a target=_blank  href="skype:<?php 
								if (isset($odin_general_opts['skype'])):
									echo $odin_general_opts['skype'];
									endif;?>?userinfo">	
								<img src="<?php echo get_stylesheet_directory_uri().'/assets/images/skype.png'?>">
							</a>
						</div>
						<div class="clearfix"></div>
						<?php echo odin_contact_form()->render();?>
						
						<!-- <form>
													<div class="form-group">
												        <label for="inputEmail">Email</label>
												        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
													</div>
													<div class="form-group">
														<label for="inputText">Mensagem</label>
														<textarea type="text" class="form-control" id="inputText" placeholder="Mensagem"></textarea>
													</div>
													<div class="checkbox">
														<label>
															<input type="checkbox"> Desejo receber atualizações
														</label>
													</div>
													<button type="submit" class="btn btn-primary">Enviar</button>
												</form> -->
					</section>
</div><!-- #secondary -->