<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */
get_header();

?>	<div class="col-md-12 esquerda no-sidebar"><!--esquerda-->
		<div id="titulo-biblioteca">	
				<h1 class="">Biblioteca</h1>
		</div><!-- # -->
					<?php
					// get the currently queried taxonomy term, for use later in the template file
					$planos = get_queried_object();
					//Começa a pegar os termos da categoria cat_biblioteca
					$terms = get_terms( 'cat_biblioteca', array(
					    'hide_empty' => 0
					) );
					?>
					<?php
					// now run a query for each animal family
					foreach ( $terms as $term ) {

					    // Define the query
					    $args = array(
					        'post_type' => 'biblioteca_item',
					        'planos' => $planos->slug,
					        'cat_biblioteca' => $term->slug,
							'posts_per_page'=>'2','paged'=>$paged
					    );
					    $query = new WP_Query( $args );
						if ($query->have_posts() ) {
						?>
							<?php next_posts_link('<div class="nav-antes noticias"></div>', $query->max_num_pages) ?>
					    	<?php previous_posts_link('<div class="nav-depois noticias"></div>') ?>
							<div id="<?php echo $term->name; ?>" class="cat_biblioteca inline-block col-md-3">
						<?php
					    	// output the term name in a heading tag                
					    		echo'<div class="titulo-cat-biblioteca"><h2>' . $term->name .'</h2></div>';

					    	// output the post titles in a list
					    		echo '<ul id="lista-' . $term->name .'-" class="lista-item-biblioteca ">';

					        // Start the Loop
					        	while ( $query->have_posts() ) : $query->the_post(); ?>

					        		<li class="item-biblioteca <?php echo  $term->name;?> " id="post-<?php the_ID(); ?>">
					            		<a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a>
					        		</li>
								
					        <?php endwhile;
					
							?>
							
							</div><!--.cat_biblioteca-->
							<?php
						}
					    	echo '</ul>';
						

					    // use reset postdata to restore orginal query
					    wp_reset_postdata();

					} ?>
	
	</div><!--col-md-11 esquerda no-sidebar-->

</div><!--row principal aberto no header-->

<?php
get_footer();