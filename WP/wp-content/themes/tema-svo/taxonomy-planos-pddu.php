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

?>	<div class="col-md-11 biblioteca esquerda no-sidebar"><!--esquerda-->
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
					$count=0;
					// now run a query for each animal family
					foreach ( $terms as $term) {
						?>
						
						<div id="enrolador-<?php echo $term->slug ; ?>"class="col-md-3">
						<?php
					    
							get_template_part('loop','biblioteca');
						?>
							
						
							
						</div>
							<?php
						}
					    	echo '</ul>';
					 ?>
	
	</div><!--col-md-11 esquerda no-sidebar-->

</div><!--row principal aberto no header-->

<?php
get_footer();