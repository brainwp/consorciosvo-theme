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
				$count = 0;
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
				    
						
					<?php $count++;endwhile;
					wp_reset_postdata();
					?>
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
		 
			<?php
			
			$args = array( 'post_type' => 'page', 'meta_key' =>'_wp_page_template', 'meta_value'=> 'page-biblioteca.php', 'posts_per_page' => 4 );
			$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					echo '<p>'.get_field('texto_da_home').'</p>';
				endwhile;
			?>
		
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
		
	</div>
	<?php get_sidebar( 'home' ); ?>
	

</div><!--row principal-->
</div><!--container pagina-->


<?php
get_footer();
