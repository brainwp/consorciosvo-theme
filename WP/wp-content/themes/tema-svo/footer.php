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
	<script>
	jQuery(function($) {
	    $('#destaques-noticias').on('click', '#pagination a', function(e){
	        e.preventDefault();
	        var link = $(this).attr('href');
			$('.nav-baixo').fadeOut(500);
	        $('#destaques-noticias').fadeOut(500, function(){
				$('.nav-baixo').fadeOut(500);
	            $(this).load(link + ' #destaques-noticias', function() {
	                $(this).fadeIn(500);
					$('.nav-baixo').fadeIn(500);
	            });
	        });
	    });
	});
	jQuery(function($) {
	    $('#noticias-ajax').on('click', '#pagination2 a', function(e){
	        e.preventDefault();
	        var link = $(this).attr('href');
			$('.nav-cima').fadeOut(500);
	        $('#noticias-ajax').fadeOut(500, function(){
	            $(this).load(link + ' #noticias-ajax', function() {
	                $(this).fadeIn(500);
					$('.nav-cima').fadeIn(500);
	            });
	        });
	    });
	});
	jQuery(function() {
	  jQuery('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        jQuery('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	</script>
</body>
</html>
