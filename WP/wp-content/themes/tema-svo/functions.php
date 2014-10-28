<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );
		
		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
// function odin_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name' => __( 'Main Sidebar', 'odin' ),
// 			'id' => 'main-sidebar',
// 			'description' => __( 'Site Main Sidebar', 'odin' ),
// 			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 			'after_widget' => '</aside>',
// 			'before_title' => '<h3 class="widgettitle widget-title">',
// 			'after_title' => '</h3>',
// 		)
// 	);
// }
// 
// add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Twitter Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );

	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';
//load fonts
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Convergence|Source+Sans+Pro:400,600');
            wp_enqueue_style( 'googleFonts');
        }
    add_action('wp_print_styles', 'load_fonts');
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function svo_scripts() {
	wp_register_style('estilo', get_stylesheet_directory_uri() . '/assets/css/estilo.css');
    wp_enqueue_style( 'estilo');
}	
add_action( 'wp_enqueue_scripts', 'svo_scripts' );

////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function inicia_barra_lateral() {

	register_sidebar( array(
		'name' => 'Barra lateral principal',
		'id' => 'barra-principal',
		'before_widget' => '<section id="%1$s" class="modulo-sidebar">',
		'after_widget' => '</section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Barra lateral Biblioteca',
		'id' => 'barra-biblioteca',
		'before_widget' => '<section id="%1$s" class="modulo-sidebar">',
		'after_widget' => '</section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'inicia_barra_lateral' );

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////	
	//requerindo os custom posts
require_once get_template_directory() . '/assets/php/custom-posts.php';
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////	

function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
    return 40;
    else
    return 80;
    }
add_filter('excerpt_length', 'custom_excerpt_length');

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
require_once (get_stylesheet_directory() . '/requires-agenda.php');
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

function the_breadcrumb() {
global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

// Inserindo novos Menus para o Rodapé

	add_action( 'init', 'register_my_menus' );
		 
		function register_my_menus() {
		register_nav_menus(
		array(
		'sitemap-1' => __( 'Site Map Coluna 1' ),
		'sitemap-2' => __( 'Site Map Coluna 2' ),
		'sitemap-3' => __( 'Site Map Coluna 3' ),
		'sitemap-4' => __( 'Site Map Coluna 4' ),
		'sitemap-5' => __( 'Site Map Coluna 5' ),		
		'sitemap-6' => __( 'Site Map Coluna 6' )			
			
		)
		);
		}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

function opcoes_do_tema(){
	$odin_theme_options = new Odin_Theme_Options( 
	    'opcoes-do-tema', // Slug/ID da página (Obrigatório)
	    __( 'Opções do tema', 'odin' ), // Titulo da página (Obrigatório)
	    'manage_options' // Nível de permissão (Opcional) [padrão é manage_options]
	);
	/////////////////////////////////////////////////////////////////////////////////
		$odin_theme_options->set_fields(
		    array(
		        'general_section' => array(
		            'tab'   => 'odin_general', // Sessão da aba odin_general
		            'title' => __( 'Opções da home', 'odin' ),
		            'fields' => array(
		                array(
						    'id'          => 'mostra-evento', // Obrigatório
						    'label'       => __( 'Mostrar Evento na Home?', 'odin' ), // Obrigatório
						    'type'        => 'checkbox', // Obrigatório
						    // 'attributes' => array(), // Opcional (atributos para input HTML/HTML5)
						    'default'     => '', // Opcional (utilize 1 para deixar marcado como padrão)
						    'description' => __( 'Se a caixa estiver marcada o evento mais recente destacado ira aparecer na Home', 'odin' ), // Opcional
						),
						array(
						    'id'          => 'texto-biblioteca', // Obrigatório
						    'label'       => __( 'Texto de descrição para a home', 'odin' ), // Obrigatório
						    'type'        => 'editor', // Obrigatório
						    'default'     => 'Default text', // Opcional
						    'description' => __( 'Descrition Example', 'odin' ), // Opcional
						    'options'     => array( // Opcional (aceita argumentos do wp_editor)
						        'textarea_rows' => 10
						    ),
						)
		            )
		        )
		    )
		);
/////////////////////////////////////////////////////////////////////////////////
	$odin_theme_options->set_tabs(
	    array(
	        array(
	            'id' => 'odin_general', // ID da aba e nome da entrada no banco de dados.
	            'title' => __( 'Configurações', 'odin' ), // Título da aba.
	        )
	    )
	);
	
}
add_action( 'init', 'opcoes_do_tema', 1 );

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
add_action('admin_init', 'flush_rewrite_rules');

/////////////////////////////////////////////////////////////////////////////////
