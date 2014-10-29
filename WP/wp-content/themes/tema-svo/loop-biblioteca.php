<?php 

global $planos;
global $term;
?><div id="biblioteca-ajax-<?php echo $term->slug;?>" >
	<?php  
	$nomepracolocar=$term->slug."_query";
	// Define the query
    $args = array(
        'post_type' => 'biblioteca_item',
        'planos' => $planos->slug,
        'cat_biblioteca' => $term->slug,
		'paged'=>$paged
    );
 wp_reset_postdata();
${$nomepracolocar} = new WP_Query( $args );
if ($$nomepracolocar->have_posts() ) {
?>
	<div id="<?php echo $term->slug; ?>" class="cat_biblioteca inline-block">
<?php
	// output the term name in a heading tag                
		echo'<div class="titulo-cat-biblioteca"><h2>' . $term->slug .'</h2></div>';

	// output the post titles in a list
		echo '<ul id="lista-' . $term->slug .'-" class="lista-item-biblioteca ">';

    // Start the Loop
    	while ( $$nomepracolocar->have_posts() ) : $$nomepracolocar->the_post(); ?>

    		<li class="item-biblioteca <?php echo  $term->slug;?> " id="post-<?php the_ID(); ?>">
        		<a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
    		</li>
		
    <?php endwhile;
}?>

		<div class="pagination-biblioteca" id="<?php echo $term->slug;?>">
			<?php 
			$paginas = $$nomepracolocar->max_num_pages;
			$pagina_atual = max(1, get_query_var('paged'));
			
			?>
			<?php 
		
		if ($paginas > 1){  
		  $current_page = max(1, get_query_var('paged'));  
		  echo '<div class="page_nav">';  
		  echo paginate_links(array(  
			  'base' => get_pagenum_link(1) . '%_%',  
			  'format' => 'page/%#%',  
			  'current' => $current_page,  
			  'total' => $paginas,  
			  'prev_text' => '<< Anteriores',  
			  'next_text' => 'Pr&oacute;ximos >>'  
			));  
		  echo '</div>';  
		} 
		?>
						<?php previous_posts_link('<div class="inline-block"> < </div>');?>
									<div class="inline-block">
										<?php echo $pagina_atual.' / '.$paginas;?>
									</div class="inline-block">
									<?php next_posts_link('<div class="inline-block"> > </div>', $paginas);?>
									
									<?php // use reset postdata to restore orginal query
								    wp_reset_postdata();?>
		</div>
	</div><!--cat_biblioteca-->
</div><!--noticias-ajax-->
