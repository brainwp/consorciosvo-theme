<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<header id="header"  class="container" role="banner">
			<?php
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
				<div class="row" id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" height="<?php esc_attr_e( $header_image->height ); ?>" width="<?php esc_attr_e( $header_image->width ); ?>" alt="" /></a></div>
			<?php endif; ?>
			
			<nav class="row">
				<div class="collapse navbar-collapse" id="menu-principal">
				      <ul class="nav navbar-nav centro col-md-12">
				        <li class="active"><a href="#">Home</a></li>
				        <li><a href="#">O que é o consórcio</a></li>
				        <li class="dropdown">
				          <a href="#0" class="dropdown-toggle" data-toggle="dropdown">Plano regional(PUI) <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#1">O que é</a></li>
				            <li><a href="#">Histórico</a></li>
				            <li><a href="#">Etapas</a></li>
				            <li><a href="#">Biblioteca</a></li>
				            <li><a href="#">Eventos</a></li>
				            <li><a href="#">Participe</a></li>
				          </ul>
				        </li>
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Planos diretores Itaparica e Vera Cruz (PDDU) <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
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
				        <li><a href="#">Contato</a></li>
						</a></li>
						<li class="dropdown busca"><a href="#"><span class="glyphicon glyphicon-search"></span></a>
				          <ul class="dropdown-menu" role="menu">
					        <li>
								<form class=" navbar-form navbar-left" role="search">
							  		<div class="form-group">
							    		<input type="text" class="form-control" placeholder="">
							  		</div>
									<div class="clearfix"></div>
							  		<button type="submit" class=" pull-right btn btn-primary">Buscar</span>
									</button>
								</form>
							</li>
				          </ul>
				        </li>
				
						
				
				
				      </ul>
				    </div><!-- /.navbar-collapse -->				
			</nav>
		</header><!-- #header -->

		<div id="main" class="site-main">
			<div class="row principal"><!--row principal-->
			