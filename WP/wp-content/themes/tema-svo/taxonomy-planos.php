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

?>	<div class="col-md-11 esquerda no-sidebar"><!--esquerda-->
		<div id="">	
			<h1 class=""></h1>
		</div><!-- # -->
					<?php
					// get the currently queried taxonomy term, for use later in the template file
					$planos = get_queried_object();
					?>
					<header class="archive-header">
					    <h1 class="archive-title">
					        <?php echo $plano->name; ?>
					    </h1>
					</header><!-- .archive-header -->
					<?php //start by fetching the terms for the animal_cat taxonomy
					$terms = get_terms( 'cat_biblioteca', array(
					    'hide_empty' => 0
					) );
					?>
					<?php
					// now run a query for each animal family
					foreach ( $terms as $term ) {

					    // Define the query
					    $args = array(
					        'post_type' => 'biblioteca',
					        'planos' => $planos->slug,
					        'cat_biblioteca' => $term->slug
					    );
					    $query = new WP_Query( $args );

					    // output the term name in a heading tag                
					    echo'<h2>' . $term->name .'</h2>';

					    // output the post titles in a list
					    echo '<ul>';

					        // Start the Loop
					        while ( $query->have_posts() ) : $query->the_post(); ?>

					        <li class="" id="post-<?php the_ID(); ?>">
					            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					        </li>

					        <?php endwhile;

					    echo '</ul>';

					    // use reset postdata to restore orginal query
					    wp_reset_postdata();

					} ?>
	
	</div><!--col-md-11 esquerda no-sidebar-->

</div><!--row principal aberto no header-->

<?php
get_footer();