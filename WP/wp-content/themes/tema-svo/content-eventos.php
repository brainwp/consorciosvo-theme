<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				?>
		        <div class="inline-block  col-md-2">	
		                    <div class="data-evento-agenda">
		                        <?php
									$ag_data = get_post_meta($post->ID,'agenda-event-date',TRUE);
					                $ag_inicio = get_post_meta($post->ID,'agenda_horario_inic',TRUE);
					                $ag_termino = get_post_meta($post->ID,'agenda_horario_fim',TRUE);
					                $ag_endereco = get_post_meta($post->ID,'agenda_endereco',TRUE);
					                $ag_bairro = get_post_meta($post->ID,'agenda_bairro',TRUE);
					                $ag_cidade = get_post_meta($post->ID,'agenda_cidade',TRUE);
					                $ag_estado = get_post_meta($post->ID,'agenda_estado',TRUE);
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
			<?php 	the_title( '<h2 class="entry-title inline-block col-md-10">', '</h2>' );
			?>
			<div class="clearfix"></div>
			<?php
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php odin_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		
		<div class="entry-content">
			<div class="single-eventos-thumbnail inline-block col-md-5"><?php the_post_thumbnail();?></div>				
			
			<div class="info-evento-single inline-block col-md-7" class="archive">
            	<p class="archive"> <spam class="negrito sem-margem">Endere&ccedil;o:</spam>
            	<?php echo $ag_endereco; ?></p>
				<hr/>
            </div>
			<div class="content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?></div>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<?php endif; ?>
	</footer>
</article><!-- #post-## -->
