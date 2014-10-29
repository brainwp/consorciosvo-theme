<?php 

global $planos;
global $term;
?><div id="biblioteca-ajax-<?php echo $term->slug;?>">
	<?php  
	$nomepracolocar=$term->slug."_query";
	echo $nomepracolocar;
	// Define the query
    $args = array(
        'post_type' => 'biblioteca_item',
        'planos' => $planos->slug,
        'cat_biblioteca' => $term->slug,
		'posts_per_page'=>'1','paged'=>$paged
    );
${$nomepracolocar} = new WP_Query( $args );
if ($$nomepracolocar->have_posts() ) {
?>
	<div id="<?php echo $term->slug; ?>" class="cat_biblioteca inline-block col-md-3">
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
			<?php echo $$nomepracolocar->max_num_pages;?>
			<?php next_posts_link('<div>></div>', $$nomepracolocar->max_num_pages) ?>
			<?php previous_posts_link('<div><</div>');
			// use reset postdata to restore orginal query
		    wp_reset_postdata();?>
		</div>
	</div><!--cat_biblioteca-->
</div><!--noticias-ajax-->
