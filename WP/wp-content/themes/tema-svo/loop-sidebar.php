<div class="destaque-lateral">
    <?php
$barra_lateral_args = array( 'post_type' => 'destaque-lateral');
$barra_lateral = new WP_Query();
$barra_lateral->query($barra_lateral_args);
?>

<?php while ( $barra_lateral->have_posts() ) : $barra_lateral->the_post(); ?>
    
	<div  id="<?php echo 'noticia-'.$counter;?>">
		<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
		<div class="resumo ">
		 	<?php the_content(); ?> 
		</div><!--resumo-->
	</div> <!-- noticia-->
	<?php global $counter;
			$counter++;?>
  <?php endwhile; ?>
	<div class='clearfix'></div>

</div><!-- destaque-lateral -->

<?php wp_reset_postdata();
?>