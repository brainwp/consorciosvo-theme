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
				<div id="logos" class="col-md-12">
					<img class="logos col-md-1" src="<?php echo get_stylesheet_directory_uri().'/assets/images/logos1.png'?>">
					<!-- <img class="logos col-md-1" src="<?php echo get_stylesheet_directory_uri().'/assets/images/logo-itaparica.png'?>"> -->
					<!-- <img class="logos col-md-1" src="<?php echo get_stylesheet_directory_uri().'/assets/images/logo-vera-cruz.png'?>"> -->
				</div>
				<div id="sitemap" class="col-md-12">
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap-1','container_class' => 'mapa inline-block') ); ?>
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap-2' ,'container_class' => 'mapa inline-block') ); ?>
				 		<?php wp_nav_menu( array( 'theme_location' => 'sitemap-3' ,'container_class' => 'mapa inline-block') ); ?>
				 		<?php wp_nav_menu( array( 'theme_location' => 'sitemap-4' ,'container_class' => 'mapa inline-block') ); ?>
				 		<?php wp_nav_menu( array( 'theme_location' => 'sitemap-5' ,'container_class' => 'mapa inline-block') ); ?>
				 		<?php wp_nav_menu( array( 'theme_location' => 'sitemap-6' ,'container_class' => 'mapa inline-block') ); ?>
				</div>
				
				<div id="contatos" class="col-md-6">
					<div class="clearfix"></div>
					<p> Outras informações de contato Telefone: 1111-1111</p>
				</div>
				
			</div> <!--row-->
			
		</footer>
	</div><!-- .container aberto no header-->

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
	  jQuery('a[href*=#]:not([href=#myCarousel])').click(function() {
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
