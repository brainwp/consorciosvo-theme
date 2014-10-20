<?php 

$custom_query_args = array( 'post_type' => 'post',
  'posts_per_page'=>'10');

// Get current page and append to custom query parameters array
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;?>

<?php if ( $custom_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
  <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    <div class="noticias">
		<a class="titulo" href="<?php echo post_permalink($post->ID); ?>"><h2><?php the_title(); ?></h2></a>
		<div class="post-thumbnail"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
		</div><!--post-thumbnail-->
		<div class="data">
			<?php echo get_the_date()?>
		</div>
		<div class="resumo">
		 <?php the_excerpt(); ?> 

		</div><!--resumo-->
	</div> <!-- noticias-->
	



  <?php endwhile; ?>


<?php // Reset postdata
wp_reset_postdata();

// Custom query loop pagination
previous_posts_link( 'Notícias mais recentes' );
next_posts_link( 'Notícias mais Antigas', $custom_query->max_num_pages );

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;?>
<?php endif; ?>
