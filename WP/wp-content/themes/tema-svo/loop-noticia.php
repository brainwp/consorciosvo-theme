<div id="noticias-ajax">
    <?php
$counter = 1;
$noticias_query_args = array( 'post_type' => 'post', 'meta_key' => 'destaque',
	'meta_value' => 'n',
  'posts_per_page'=>'4','paged'=>$paged);
$noticias_query = new WP_Query();
$noticias_query->query($noticias_query_args);
?>

<?php while ( $noticias_query->have_posts() ) : $noticias_query->the_post(); ?>
    <div class="noticia inline-block col-md-3" id="<?php echo 'noticia-'.$counter;?>">
		<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h3><?php the_title(); ?></h3></a>
			<div class="data">
				<?php echo get_the_date()?>
			</div>
		
		<div class="resumo ">
		 	<?php the_excerpt(); ?> 
		</div><!--resumo-->
	</div> <!-- noticia-->
	<?php 
			$counter++;?>
  <?php endwhile; ?>
	<div class='clearfix'></div>

    <div id="pagination2">
    	<?php next_posts_link('Notícias Antigos', $noticias_query->max_num_pages) ?>
    	<?php previous_posts_link('Notícias Rececentes') ?>
    </div>
</div><!-- #noticias-ajax -->

<?php wp_reset_postdata();
?>