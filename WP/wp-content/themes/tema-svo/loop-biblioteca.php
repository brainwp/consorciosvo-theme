<?php 

global $planos;
global $term;
?>
<div id="biblioteca-ajax-<?php echo $term->slug;?>" >
	<?php  
	$nomepracolocar=$term->slug."_query";
	// Define the query
    $args = array(
        'post_type' => 'biblioteca_item',
        'planos' => $planos->slug,
        'cat_biblioteca' => $term->slug,
		// 'posts_per_page'=>'2',
		'paged'=>$paged
    );
	$$nomepracolocar = null;
	$$nomepracolocar = new WP_Query( $args );
	$$nomepracolocar->query($args);?>
	<div id="<?php echo $term->slug; ?>" class="cat_biblioteca inline-block">
	<?php
	// output the term name in a heading tag                
		echo'<div class="titulo-cat-biblioteca"><h2>' . $term->name .'</h2></div>';
		echo'<div class="descrição-cat-biblioteca"><h4>' . $term->description .'</h4></div>';
		echo '<hr>';

	// output the post titles in a list
		echo '<ul id="lista-' . $term->slug .'-" class="lista-item-biblioteca ">';
	if ($$nomepracolocar->have_posts() ) {

    // Start the Loop
    	while ( $$nomepracolocar->have_posts() ) : $$nomepracolocar->the_post(); ?>

    		<li class="item-biblioteca <?php echo  $term->slug;?> " id="post-<?php the_ID(); ?>">
        		<a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
    		</li>
		
    <?php endwhile;?>
	
	<?php }?></div><!--cat_biblioteca-->

		<div class="pagination-biblioteca" id="<?php echo $term->slug;?>">
			<?php 
			$paginas = $$nomepracolocar->max_num_pages;
			$pagina_atual = max(1, get_query_var('paged'));
		 	if ($paginas > 1):
				previous_posts_link('<div class="seta-esquerda inline-block">  </div>');?>
				<div class="inline-block">
					<?php echo $pagina_atual.' / '.$paginas;?>
				</div class="inline-block">
				<?php next_posts_link('<div class=" seta-direita inline-block">  </div>', $paginas);
				 // use reset postdata to restore orginal query
				wp_reset_postdata();
			endif;
			?>
		</div><!--pagination-->
		
</div><!--biblioteca-ajax-->
