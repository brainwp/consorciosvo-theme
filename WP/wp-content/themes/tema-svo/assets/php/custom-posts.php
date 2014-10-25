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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function destaque_lateral_cpt() {
    $destaque_lateral = new Odin_Post_Type(
        'Destaque Lateral', // Nome (Singular) do Post Type.
        'destaque-lateral' // Slug do Post Type.
    );

    $destaque_lateral->set_labels(
        array(
            'menu_name' => __( 'Destaque Lateral', 'odin' ),
			'add_new_item' => __('Destaque Lateral'),
			'name' =>__('Destaques Laterais'),
			'all_items' => __('Todos os Destaques Laterais')

        )
    );

    $destaque_lateral->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail')
        )
    );
}
add_action( 'init', 'destaque_lateral_cpt', 1 );

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////
function odin_biblioteca_taxonomy2() {
    $biblioteca2 = new Odin_Taxonomy(
        'Local', // Nome (Singular) da nova Taxonomia.
        'local', // Slug do Taxonomia.
        'biblioteca' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $biblioteca2->set_labels(
        array(
            'menu_name' => __( 'Local do item de biblioteca', 'odin' ),
			'name'                       => __( 'Local', 'odin' ),
			'singular_name'              => __( 'Local', 'odin' ),
			'add_or_remove_items'        => __( 'Adicionar ou remover locais', 'odin' ),
			'view_item'                  => __( 'Ver locais', 'odin' ),
			'edit_item'                  => __( 'Editar locais', 'odin' ),
			'search_items'               => __( 'Buscar Locais', 'odin' ),
			'update_item'                => __( 'Update Locais', 'odin' ),
			'parent_item'                => __( 'Parent Locais:', 'odin' ),
			'parent_item_colon'          => __( 'Parent Locais:', 'odin' ),
			'add_new_item'               => __( 'Adicionar novo local', 'odin' ),
			'new_item_name'              => __( 'Novo Local', 'odin' ),
			'all_items'                  => __( 'Todos os locais', 'odin' ),
			'separate_items_with_commas' => __( 'Separe os locais com virgulas.', 'odin' ),
			'choose_from_most_used'      => __( 'Escolha entre os locais mais usados', 'odin' ), 
        )
    );

    $biblioteca2->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}

add_action( 'init', 'odin_biblioteca_taxonomy2', 1 );
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
function odin_biblioteca_taxonomy() {
    $biblioteca = new Odin_Taxonomy(
        'Tipo de Item', // Nome (Singular) da nova Taxonomia.
        'tipo', // Slug do Taxonomia.
        'biblioteca' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $biblioteca->set_labels(
        array(
            'menu_name' => __( 'Tipos de item de biblioteca', 'odin' )
        )
    );

    $biblioteca->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}

add_action( 'init', 'odin_biblioteca_taxonomy', 1 );
///////////////////////////////////////////////////////////
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
