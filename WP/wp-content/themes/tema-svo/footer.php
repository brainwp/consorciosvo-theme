<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		<footer class= "container">
			<div class="row">
				<div id="sitemap" class="col-md-9">
					<ul class="mapa">
				        <li><a href="#">O que é o consórcio</a></li>
				        <li class="">
				          <a href="#" class="">Plano regional(PUI) </a>
				          <ul class="" >
				            <li><a href="#1">O que é</a></li>
				            <li><a href="#">Histórico</a></li>
				            <li><a href="#">Etapas</a></li>
				            <li><a href="#">Biblioteca</a></li>
				            <li><a href="#">Eventos</a></li>
				            <li><a href="#">Participe</a></li>
				          </ul>
				        </li>
						<li class="">
				          <a href="#" class="">Planos diretores Itaparica e Vera Cruz (PDDU) </a>
				          <ul class="" >
				            <li><a href="#">O que é</a></li>
				            <li><a href="#">Histórico</a></li>
				            <li><a href="#">Etapas</a></li>
				            <li><a href="#">Biblioteca</a></li>
				            <li><a href="#">Eventos</a></li>
				            <li><a href="#">Participe</a></li>
				          </ul>
				        </li>
				        <li><a href="#">Notícias</a></li>
				        <li><a href="#">Agenda</a></li>
						</a></li>
				      </ul>
				</div>
				<div id="logos" class="col-md-3"><img class="logos" src="<?php echo get_stylesheet_directory_uri().'/assets/images/logos1.png'?>"><div class=clearfix></div><img class="logos"src="<?php echo get_stylesheet_directory_uri().'/assets/images/logos2.png'?>">
				</div>
				<div id="contatos" class="col-md-6">
					<div class="clearfix"></div>
					<p> Outras informações de contato Telefone: 1111-1111</p>
				</div>
				
			</div> <!--row-->
			
		</footer>
	</div><!-- .container -->

	<?php wp_footer(); ?>
</body>
</html>
