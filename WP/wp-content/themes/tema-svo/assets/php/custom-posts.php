<?php 
function noticias_cpt() {
    $noticia = new Odin_Post_Type(
        'Notícia', // Nome (Singular) do Post Type.
        'noticia' // Slug do Post Type.
    );

    $noticia->set_labels(
        array(
            'menu_name' => __( 'Notícias', 'odin' )
        )
    );

    $noticia->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail', 'post-formats' )
        )
    );
}


///////////////////////////////////////////////////////////
function biblioteca_cpt() {
    $biblioteca = new Odin_Post_Type(
        'Item de biblioteca', // Nome (Singular) do Post Type.
        'biblioteca' // Slug do Post Type.
    );

    $biblioteca->set_labels(
        array(
            'menu_name' => __( 'Item de biblioteca', 'odin' )
        )
    );

    $biblioteca->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail', 'post-formats' )
        )
    );
}

add_action( 'init', 'biblioteca_cpt', 1 );
///////////////////////////////////////////////////////////

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_noticias-2',
		'title' => 'Notícias',
		'fields' => array (
			array (
				'key' => 'field_543deb93837e6',
				'label' => 'Destacar?',
				'name' => 'destacar',
				'type' => 'true_false',
				'instructions' => 'Marque se deseja que essa notícia seja exibida no destaque da página inicial.',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'noticia',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}