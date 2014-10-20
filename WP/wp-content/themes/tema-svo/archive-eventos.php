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
if (isset($_GET["local"])){
	if ($_GET["local"]== "pddu") {
		$cat="planos-diretores-itaparica-e-vera-cruz";
		
	}
	else if ($_GET["local"] == "pui"){		
		$cat="plano-regional";
	}
}
else {
	$cat="";
}

?>	<div class="col-md-8 esquerda"><!--esquerda-->
		<div id="resumo">	
			<h1 class="category-agenda">EVENTOS</h1>
		</div><!-- #resumo -->
					<?php echo "$cat";?>
			        <div id="primeira-linha">
				
			            <!-- Inicio Loop Agenda --> 
			  <?php

			                        $args = array(
			                            'post_type' => 'eventos',
			                            'cat_agenda' => $cat,
			                            "meta_key" => "agenda-event-date", // Campo da Data do Evento
			                            "orderby" => "meta_value", // This stays as 'meta_value' or 'meta_value_num' (str sorting or numeric sorting)
			                            "order" => "DESC",
			                            'paged' => $paged,
			                            );

			                        $loop_agenda = new WP_Query( $args );
			                        while ( $loop_agenda->have_posts() ) : $loop_agenda->the_post();

			                        global $post;
			                            // Pega os dados e salva em variáveis
			                            $ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
			                            $ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
			                            $ag_termino = get_post_meta($post->ID,'agenda_horario_fim',TRUE);
			                            $ag_endereco = get_post_meta($post->ID,'agenda_endereco',TRUE);
			                            $ag_bairro = get_post_meta($post->ID,'agenda_bairro',TRUE);
			                            $ag_cidade = get_post_meta($post->ID,'agenda_cidade',TRUE);
			                            $ag_estado = get_post_meta($post->ID,'agenda_estado',TRUE);
			                    ?>

			                    <?php
			                    // Seta a data atual - 1 dia
			                    $datahoje = date('Y/m/d');
			                    $dataexpira = strtotime( $datahoje );

			                    // Transforma a $ag_data em tempo
			                    $ag_data_time = strtotime( $ag_data );

			                    // Condição: Se a data do evento for maior ou igual que a data de expiração, exibe normalmente!
			                    if ( $ag_data_time >= $dataexpira ) { ?>

			                                    <div id="cada-dia">
			                                    <div id="agenda-geral">	
			                                        <div class="evento-agenda">
			                                                <a href="<?php the_permalink() ?>">
			                                                <div class="data-evento-agenda">
			                                                    <?php
			                                                        $data_invertida = $ag_data;
			                                                        /* Quebra a Data em 3 */
			                                                        $data_explode = explode("/", $data_invertida);
			                                                        $mes = $data_explode[1];

			                                                        switch ($mes){
			                                                            case 1: $mes="Jan"; break;
			                                                            case 2: $mes="Fev"; break;
			                                                            case 3: $mes="Mar"; break;
			                                                            case 4: $mes="Abr"; break;
			                                                            case 5: $mes="Mai"; break;
			                                                            case 6: $mes="Jun"; break;
			                                                            case 7: $mes="jul"; break;
			                                                            case 8: $mes="Ago"; break;
			                                                            case 9: $mes="Set"; break;
			                                                            case 10: $mes="Out"; break;
			                                                            case 11: $mes="Nov"; break;
			                                                            case 12: $mes="Dez"; break;
			                                                            default: $mes="Valor invalido"; 
			                                                        }

			                                                    ?>
			                                                    <div id="mes-agenda"><?php echo $mes; ?></div>
			                                                    <div id="dia-agenda"><?php echo $data_explode[2]; ?></div>

			                                                </div><!-- .data-evento-agenda -->
			                                                </a>
			                                        </div><!-- #evento-agenda -->
			                                    </div><!-- #agenda-geral -->
			                                    <div id="agenda-archive-titulo"> <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
			                                        <div id="info-evento" class="archive">
			                                        <h1 class="negrito">Endere&ccedil;o:</h1>
			                                        <p class="archive"><?php echo $ag_endereco; ?>
			                                        <h1 class="negrito">Hor&aacute;rio:</h1>
			                                        <p class="archive"><?php echo $ag_inicio; ?></p>
			                                        </div>

			                                        <div id="leia-mais-agenda" class="archive">
			                                        <a href="<?php the_permalink() ?>">Leia mais</a>
			                                        </div>
			                                    </div><!-- #cada-dia -->  


			                    <?php } 
			                     // Condição: Se a data do evento for menor que a data de expiração, exibe! Evento Passado
			                    if ( $ag_data_time < $dataexpira ) { ?>
			                                    <div id="cada-dia" class="passado">
			                                    <div id="agenda-geral">	
			                                        <div class="evento-agenda">
			                                                <a href="<?php the_permalink() ?>">
			                                                <div class="data-evento-agenda">
			                                                    <?php
			                                                        $data_invertida = $ag_data;
			                                                        /* Quebra a Data em 3 */
			                                                        $data_explode = explode("/", $data_invertida);
			                                                        $mes = $data_explode[1];

			                                                        switch ($mes){
			                                                            case 1: $mes="Jan"; break;
			                                                            case 2: $mes="Fev"; break;
			                                                            case 3: $mes="Mar"; break;
			                                                            case 4: $mes="Abr"; break;
			                                                            case 5: $mes="Mai"; break;
			                                                            case 6: $mes="Jun"; break;
			                                                            case 7: $mes="jul"; break;
			                                                            case 8: $mes="Ago"; break;
			                                                            case 9: $mes="Set"; break;
			                                                            case 10: $mes="Out"; break;
			                                                            case 11: $mes="Nov"; break;
			                                                            case 12: $mes="Dez"; break;
			                                                            default: $mes="Valor invalido"; 
			                                                        }

			                                                    ?>
			                                                    <div id="mes-agenda"><?php echo $mes; ?></div>
			                                                    <div id="dia-agenda"><?php echo $data_explode[2]; ?></div>

			                                                </div><!-- .data-evento-agenda -->
			                                                </a>
			                                        </div><!-- #evento-agenda -->
			                                    </div><!-- #agenda-geral -->
			                                    <div id="agenda-archive-titulo"> <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
			                                        <div id="info-evento" class="archive">
			                                        <h1 class="negrito">Endere&ccedil;o:</h1>
			                                        <p class="archive"><?php echo $ag_endereco; ?>
			                                        <h1 class="negrito">Hor&aacute;rio:</h1>
			                                        <p class="archive"><?php echo $ag_inicio; ?></p>
			                                        </div>

			                                        <div id="leia-mais-agenda" class="archive">
			                                        <a href="<?php the_permalink() ?>">Leia mais</a>
			                                        </div>
			                                    </div><!-- #cada-dia -->  
			                    <?php } ?>
			            <?php endwhile; ?>
			            <!-- Fim Loop -->

			        </div><!-- #primeira-linha -->
					<?php /* Display navigation to next/previous pages when applicable */ ?>
						<?php 
						global $wp_query;  
					$total_pages = $wp_query->max_num_pages;  
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
					?>
					</div><!--row principal-->

</div><!--container pagina-->

<?php
get_footer();