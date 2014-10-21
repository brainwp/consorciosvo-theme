<?php 

$custom_query_args = array( 'post_type' => 'post',
  'posts_per_page'=>'9');

// Get current page and append to custom query parameters array
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
$counter=1;
?>
<?php if ( $custom_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    <div class="noticia inline-block col-md-4">
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
	<?php $mod=$counter % 3;
				if ($mod==0) {
			echo "<div class='clearfix'></div>";
			}
			$counter++;?>



  <?php endwhile; ?>


<?php // Reset postdata
$total_pages = $custom_query->max_num_pages;  
if ($total_pages > 1){  
$current_page = max(1, get_query_var('paged'));  
echo '<div class="page_nav">';  
echo paginate_links(array(  
  'base' => get_pagenum_link(1) . '%_%',  
  'format' => '/page/%#%',  
  'current' => $current_page,  
  'total' => $total_pages,  
  'prev_text' => '<< Anteriores',  
  'next_text' => 'Pr&oacute;ximos >>'  
));  
echo '</div>';  
}
wp_reset_postdata();

// Custom query loop pagination

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;?>
<?php endif; ?>
