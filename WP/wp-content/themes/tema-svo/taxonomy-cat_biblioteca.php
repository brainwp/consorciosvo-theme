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
		<div id="resumo">	
			<h1 class="category-agenda">EVENTOS</h1>
		</div><!-- #resumo -->
					<?php 
					$counter = 1;?>
			        <div id="primeira-linha">
					
			           <?php 
						$cat = 'planos-diretores-itaparica-e-vera-cruz';
						get_template_part( 'loop', 'agenda');?>
						
						<div class="clearfix"></div>
						
			        </div><!-- #primeira-linha -->
					<?php /* Display navigation to next/previous pages when applicable */ ?>
						<?php 
					
						global $loop_agenda;  
					$total_pages = $loop_agenda->max_num_pages;  
					if ($total_pages > 1){  
					  $current_page = max(1, get_query_var('paged'));  
					  echo '<div class="page_nav">';  
					  echo paginate_links(array(  
						  'base' => get_pagenum_link(1) . '%_%',  
						  'format' => 'page/%#%',  
						  'current' => $current_page,  
						  'total' => $total_pages,  
						  'prev_text' => '<< Anteriores',  
						  'next_text' => 'Pr&oacute;ximos >>'  
						));  
					  echo '</div>';  
					} 
					?>
					</div><!--row principal-->

</div><!--container pagina-->

<?php
get_footer();