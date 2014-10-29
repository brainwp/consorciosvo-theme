<?php 

global $args;
global $term;
?><div id="biblioteca-ajax-<?php echo $term->slug;?>">
	<?php 
$query = new WP_Query( $args );
if ($query->have_posts() ) {
?>
	<div id="<?php echo $term->slug; ?>" class="cat_biblioteca inline-block col-md-3">
<?php
	// output the term name in a heading tag                
		echo'<div class="titulo-cat-biblioteca"><h2>' . $term->slug .'</h2></div>';

	// output the post titles in a list
		echo '<ul id="lista-' . $term->slug .'-" class="lista-item-biblioteca ">';

    // Start the Loop
    	while ( $query->have_posts() ) : $query->the_post(); ?>

    		<li class="item-biblioteca <?php echo  $term->slug;?> " id="post-<?php the_ID(); ?>">
        		<a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
    		</li>
		
    <?php endwhile;
}?>

		<div class="pagination-biblioteca" id="<?php echo $term->slug?>">
			<?php next_posts_link('<div>></div>', $query->max_num_pages) ?>
			<?php previous_posts_link('<div><</div>') ?>
		</div>
	</div><!--cat_biblioteca-->
</div><!--noticias-ajax-->
