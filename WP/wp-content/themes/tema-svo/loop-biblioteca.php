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
		// 'posts_per_page'=>'2',
		'paged'=>$paged
    );
$query_atas = null;
$query_atas = new WP_Query( $args );
$query_atas->query($args);
echo $post->post_type;

if ($query_atas->have_posts() ) {
?>
	<div id="<?php echo $term->slug; ?>" class="cat_biblioteca inline-block">
<?php
	// output the term name in a heading tag                
		echo'<div class="titulo-cat-biblioteca"><h2>' . $term->slug .'</h2></div>';

	// output the post titles in a list
		echo '<ul id="lista-' . $term->slug .'-" class="lista-item-biblioteca ">';

    // Start the Loop
    	while ( $query_atas->have_posts() ) : $query_atas->the_post(); ?>

    		<li class="item-biblioteca <?php echo  $term->slug;?> " id="post-<?php the_ID(); ?>">
        		<a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
    		</li>
		
    <?php endwhile;
}?>

		<div class="pagination-biblioteca" id="<?php echo $term->slug;?>">
			<?php 
			$paginas = $query_atas->max_num_pages;
			$pagina_atual = max(1, get_query_var('paged'));
			
			?>
			<?php 
		
	
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
