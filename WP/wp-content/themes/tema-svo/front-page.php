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
		<section id="noticias" class="row">
			<h2>Notícias</h2>
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Carousel indicators -->
			    <ol class="carousel-indicators">
			        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
			    </ol>   
			
				<div class="carousel-inner">
				<?php
				$args = array( 'post_type' => 'noticia', 'meta_key' =>'destacar', 'meta_value'=> TRUE, 'posts_per_page' => 4 );
				$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="item <?php if ($count == 0){echo 'active';}?>">
							<div class="img-carousel col-md-6">
				             	<?php the_post_thumbnail(); ?> 
							</div>
							<div class="carousel-caption col-md-6">
			            	  	<div class="titulo-carousel">
				            		<h3><?php the_title();?></h3>
								</div>
								<div class="texto-carousel">
									<p> <?php the_excerpt();?></p>
				            	</div>
				 			</div>
				 	    </div>
				    
						
					<?php $count++;endwhile;?>
				</div>
			    <!-- Carousel items -->
			
			
			    <!-- Carousel nav -->
			    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left"></span>
			    </a>
			    <a class="carousel-control right" href="#myCarousel" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right"></span>
			    </a>
			</div><!--carousel-inner-->
			
		</section>
		<section id="biblioteca" class="row">
			<h2>Biblioteca</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a href=#>Acesse aqui</a>
			</p>
			<!-- <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</h4>
									<div id="item-bibli" class="col-md-4">
										<img src="img/pdf.png">
										<h4>Nome da Mídia</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									</div>
									<div id="item-bibli" class="col-md-4">
										<img src="img/jpg.png">
										<h4>Nome da Mídia</h4>
										<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
									</div>
									<div id="item-bibli" class="col-md-4">
										<img src="img/doc.png">
										<h4>Nome da Mídia</h4>
										<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>	 -->			
		</section>
		<section id="enderecos" class="row">
			<h2>Endereços</h2>
			<p>Endereço 1:<a href="#"> rua do endereço1, 1111, CEP 00000-000</a></p>
			<p>Endereço 2:<a href="#"> rua do endereço1, 1111, CEP 00000-000</a></p>
			<p>Endereço 3:<a href="#"> rua do endereço1, 1111, CEP 00000-000</a></p>
			<p>Endereço 4:<a href="#"> rua do endereço1, 1111, CEP 00000-000</a></p>
			
		</section>
		
	</div>
	<aside class="col-md-4 sidebar direita">
		
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
		</section>
		
		<section id="agenda" class="modulo-sidebar">
			<h2>Agenda</h2>
		</section>
		
		
	</aside>	
</div><!--row principal-->
</div><!--container pagina-->


<?php
get_footer();
