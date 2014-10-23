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
			'id' => 'acf_biblioteca',
			'title' => 'Biblioteca',
			'fields' => array (
				array (
					'key' => 'field_543e0293a4b8a',
					'label' => 'Texto da Página Inicial',
					'name' => 'texto_da_home',
					'type' => 'wysiwyg',
					'instructions' => 'Texto que irá aparecer na descrição da biblioteca na página inicial',
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 'yes',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_template',
						'operator' => '==',
						'value' => 'page-biblioteca.php',
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
		register_field_group(array (
			'id' => 'acf_noticias-3',
			'title' => 'Notícias',
			'fields' => array (
				array (
					'key' => 'field_54473556739be',
					'label' => 'Destaque',
					'name' => 'destaque',
					'type' => 'select',
					'required' => 1,
					'choices' => array (
						's' => 'Sim',
						'n' => 'Não',
					),
					'default_value' => 'n : Não',
					'allow_null' => 0,
					'multiple' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
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
