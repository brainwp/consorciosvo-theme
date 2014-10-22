<div id="destaques-noticias">
    <?php
$counter = 1;
$destaques_query_args = array( 'post_type' => 'post', 'meta_key' =>'destaque', 'meta_value' => 's',
  'posts_per_page'=>'3','paged'=>$paged);
$destaques_query = new WP_Query();
$destaques_query->query($destaques_query_args);
?>

<?php while ( $destaques_query->have_posts() ) : $destaques_query->the_post(); ?>
   <?php switch ($counter) {
	  	case 1:?>
			 <div class="noticia inline-block col-md-7" id="<?php echo 'noticia-destaque'.$counter;?>">
				<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
				<div class="post-thumbnail"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
					<?php the_excerpt(); ?> 

				</div><!--post-thumbnail-->
				<div class="data">
					<?php echo get_the_date()?>
				</div>
			</div> <!-- noticia-->
	
		<?php 
		break;
		case 2:?>
			 <div class="noticia inline-block col-md-5" id="<?php echo 'noticia-destaque'.$counter;?>">
	    		
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
				<div class="post-excerpt"><?php the_excerpt(); ?></div>
				<div class="data">
					<?php echo get_the_date()?>
				</div>

			</div> <!-- noticia-->
	
		<?php
       	break;
		}
		$counter++;
	 	endwhile; ?>
	<div class='clearfix'></div>
    <div id="pagination">
    	<?php next_posts_link('Destaques Antigos', $destaques_query->max_num_pages) ?>
    	<?php previous_posts_link('Destaques Rececentes') ?>
    </div>
</div><!-- #destaques-noticias -->

<?php wp_reset_postdata();
?>