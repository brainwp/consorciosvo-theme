<!-- Inicio Loop Agenda --> 
<?php
			global $counter;
			global $cat;
            $args = array(
                'post_type' => 'eventos',
                'cat_agenda' => $cat,
                "meta_key" => "agenda-event-date", // Campo da Data do Evento
                "orderby" => "meta_value", // This stays as 'meta_value' or 'meta_value_num' (str sorting or numeric sorting)
                "order" => "DESC",
				'posts_per_page'=>'9',
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

                        <div class="cada-dia inline-block">
                        <div class="inline-block agenda-geral">	
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
                                        <div class="mes-agenda"><?php echo $mes; ?></div>
                                        <div class="dia-agenda"><?php echo $data_explode[2]; ?></div>
                                    </div><!-- .data-evento-agenda -->
									<div class="hora-evento"><?php echo $ag_inicio; ?></div>
                            </div><!-- #evento-agenda -->
                        </div><!-- #agenda-geral -->
                        <div class="agenda-archive-titulo inline-block" > <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
								<div class="clearfix"></div>
                            	<div class="info-evento" class="archive">
                            	<h3 class="negrito">Endere&ccedil;o:</h3>
                            	<p class="archive"><?php echo $ag_endereco; ?></p>
                            	
                            </div>
							<div class="leia-mais-agenda" class="archive">
                            	<a href="<?php the_permalink() ?>">Leia Mais</a>
                            </div>
							<div class="clearfix"></div>
                        </div><!-- #cada-dia -->  
        <?php } 
         // Condição: Se a data do evento for menor que a data de expiração, exibe! Evento Passado
        if ( $ag_data_time < $dataexpira ) { ?>
                        <div class="cada-dia inline-block passado">
                        <div class="agenda-geral inline-block">	
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
                                        <div class="mes-agenda"><?php echo $mes; ?></div>
                                        <div class="dia-agenda"><?php echo $data_explode[2]; ?></div>
                                    </div><!-- .data-evento-agenda -->
									<div class="hora-evento"><?php echo $ag_inicio; ?></div>
                            </div><!-- #evento-agenda -->
                        </div><!-- #agenda-geral -->
                        <div class="agenda-archive-titulo inline-block" > <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
								<div class="clearfix"></div>
                            	<div class="info-evento" class="archive">
                            	<h3 class="negrito">Endere&ccedil;o:</h3>
                            	<p class="archive"><?php echo $ag_endereco; ?></p>
                            	
                            </div>
							<div class="leia-mais-agenda" class="archive">
                            	<a href="<?php the_permalink() ?>">Leia Mais</a>
                            </div>
							<div class="clearfix"></div>
                        </div><!-- #cada-dia -->  
        <?php } ?>
<?php		$mod=$counter % 3;
			if ($mod==0) {
		echo "<div class='clearfix'></div>";
		}
		$counter++;
		
endwhile; ?>
<!-- Fim Loop -->