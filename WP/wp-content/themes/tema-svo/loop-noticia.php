<div id="noticias-ajax">
    <?php
$counter = 1;
$noticias_query_args = array( 'post_type' => 'post', 'meta_key' => 'destaque',
	'meta_value' => 'n',
  'posts_per_page'=>'2','paged'=>$paged);
$noticias_query = new WP_Query();
$noticias_query->query($noticias_query_args);
?>

<?php while ( $noticias_query->have_posts() ) : $noticias_query->the_post(); ?>
    <div class="noticia inline-block <?php switch ($counter) {
	  case 1:
	    echo 'col-md-6';
	    break;
	  case 2:
	    echo 'col-md-4';
	    break;
	}?>" id="<?php echo 'noticia-'.$counter;?>">
		<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
		<div class="post-thumbnail"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
			<div class="data">
				<?php echo get_the_date()?>
			</div>
		</div><!--post-thumbnail-->
		
		<div class="resumo ">
		 <?php the_excerpt(); ?> 
		</div><!--resumo-->
	</div> <!-- noticia-->
	<?php $mod=$counter % 2;
				if ($mod==0) {
			echo "<div class='clearfix'></div>";
			}
			$counter++;?>
  <?php endwhile; ?>
    <div id="pagination2">
    <?php next_posts_link('Destaques Antigos', $noticias_query->max_num_pages) ?>
    <?php previous_posts_link('Destaques Rececentes') ?>
    </div>
</div><!-- #noticias -->

<?php wp_reset_postdata();
?>