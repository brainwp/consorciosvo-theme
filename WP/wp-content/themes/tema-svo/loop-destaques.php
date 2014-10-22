<div id="destaques-noticias">
    <?php
$counter = 1;
$destaques_query_args = array( 'post_type' => 'post', 'meta_key' =>'destaque', 'meta_value' => 's',
  'posts_per_page'=>'3','paged'=>$paged);
$destaques_query = new WP_Query();
$destaques_query->query($destaques_query_args);
?>

<?php while ( $destaques_query->have_posts() ) : $destaques_query->the_post();
	?>
		<div class="bloco-destaques">
	<?php
   	switch ($counter) {//verifica a contagem de posts para saber qual a posição no layout
	  	case 1:?>
			<?php
			 	if ($destaques_query->post_count == 1 ){//verifica se o número de posts exibidos é menos que 3 para não "quebrar o layout"
					echo '<div class="espaco col-md-3"></div><div class="noticia inline-block col-md-6"'; 
				}
				else if ($destaques_query->post_count == 2 ){
					echo '<div class="noticia inline-block col-md-6"'; 
				}
				else{
					echo '<div class="noticia inline-block col-md-7"';
				}				
				?>" 
				id="<?php echo 'noticia-destaque'.$counter;?>">
				<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
				<div class="post-thumbnail"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
					<div class="data">
						<?php echo get_the_date()?>
					</div>
					<?php the_excerpt(); ?> 

				</div><!--post-thumbnail-->
				
			</div> <!-- noticia-->
	
		<?php 
		break;
		case 2:
			if ($destaques_query->post_count == 2 ){
				echo '<div class="noticia inline-block col-md-6"'; 
			}
			else{
				echo'<div class="noticia inline-block col-md-5"';
			}
		?>
			  id="<?php echo 'noticia-destaque'.$counter;?>">
	    		
				<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h3><?php the_title(); ?></h3></a>
				<div class="post-thumbnail col-md-6"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
				</div><!--post-thumbnail-->
				<div class="data">
					<?php echo get_the_date()?>
				</div>
				<div class="post-excerpt"><?php the_excerpt(); ?></div>
				
			</div> <!-- noticia-->
	
		<?php
   		break;
   		case 3:?>
			 <div class="noticia inline-block col-md-5" id="<?php echo 'noticia-destaque'.$counter;?>">
	    		
				<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
				<div class="data">
					<?php echo get_the_date()?>
				</div>
				<div class="post-excerpt">
				<?php the_excerpt(); ?></div>
				

			</div> <!-- noticia-->
	
		<?php
       	break;
		}
		$counter++;
	 	?>
		</div><!--bloco-destaques-->
		<?php endwhile; ?>
	<div class='clearfix'></div>
    <div id="pagination">
    	<?php next_posts_link('<div class="nav-antes"></div>', $destaques_query->max_num_pages) ?>
    	<?php previous_posts_link('<div class="nav-depois"></div>') ?>
    </div>
</div><!-- #destaques-noticias -->

<?php wp_reset_postdata();
?>