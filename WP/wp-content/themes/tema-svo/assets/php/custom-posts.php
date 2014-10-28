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
            'supports' => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
		    'hierarchical'        => false,

        )
    );
}

add_action( 'init', 'biblioteca_cpt', 1 );
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
// Adiciona Taxonomia cat_biblioteca para organizar itens em diagnósticos, mapas, atas e legislação
register_taxonomy(
'cat_biblioteca',
'biblioteca',
array( 
'label' => 'Adicionar Categorias ',
'singular_label' => 'Categoria',
'rewrite' => true,
'hierarchical' => true,
'capabilities' => array(
        'manage_terms' => 'nobody',
        'edit_terms' => 'nobody',
        'delete_terms' => 'nobody',
    )
)
);
///////////////////////////////////////////////////////////
	///Insere as categorias dos itens de biblioteca
	wp_insert_term(
	  'Diagnósticos', // the term 
	  'cat_biblioteca', // the taxonomy
	  array(
	    'description'=> 'Categoria dos Itens de biblioteca',
	    'slug' => 'diagnosticos',
	  )
	);
	wp_insert_term(
	  'Mapas', // the term 
	  'cat_biblioteca', // the taxonomy
	  array(
	    'description'=> 'Categoria dos Itens de biblioteca',
	    'slug' => 'mapas',
	  )
	);
	wp_insert_term(
	  'Atas', // the term 
	  'cat_biblioteca', // the taxonomy
	  array(
	    'description'=> 'Categoria dos Itens de biblioteca',
	    'slug' => 'atas',
	  )
	);
	wp_insert_term(
	  'Legislação', // the term 
	  'cat_biblioteca', // the taxonomy
	  array(
	    'description'=> 'Categoria dos Itens de biblioteca',
	    'slug' => 'legislacao',
	  )
	);
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
// Adiciona Taxonomia planos para organizar itens em pddu ou pui
register_taxonomy(
'planos',
'biblioteca',
array( 
'label' => 'Adicionar Plano ',
'singular_label' => 'Categoria',
'rewrite' => true,
'hierarchical' => true,
'capabilities' => array(
        'manage_terms' => 'nobody',
        'edit_terms' => 'nobody',
        'delete_terms' => 'nobody',
    )
)
);
///////////////////////////////////////////////////////////
///Insere os planos
wp_insert_term(
  'Plano regional (PUI) ', // the term 
  'planos', // the taxonomy
  array(
    'description'=> 'Itens de biblioteca do Plano regional (PUI) ',
    'slug' => 'pui',
  )
);
wp_insert_term(
  'Planos diretores Itaparica e Vera Cruz (PDDU) ', // the term 
  'planos', // the taxonomy
  array(
    'description'=> 'Itens de biblioteca do Planos diretores Itaparica e Vera Cruz (PDDU) ',
    'slug' => 'pddu',
  )
);
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