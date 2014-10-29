<?php 

//////////////////////////////////////////////////////////
add_action( 'init', 'destaque_lateral_cpt', 1 );

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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// // CustomPostType destaque
	// add_action('init', 'destaque_lateral_cpt');
	// 
	// // Labels
	// function destaque_lateral_cpt() {
	// $labels = array(
	// 'name' => _x('Destaque', 'post type general name'),
	// 'singular_name' => _x('Destaque', 'post type singular name'),
	// 'add_new' => _x('Novo Destaque', 'Novo item'),
	// 'add_new_item' => __('Novo Destaque'),
	// 'edit_item' => __('Editar Destaque'),
	// 'new_item' => __('Novo Destaque'),
	// 'view_item' => __('Ver Destaque'),
	// 'search_items' => __('Procurar Destaque'),
	// 'not_found' => __('Nenhum registro encontrado'),
	// 'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
	// 'parent_item_colon' => '',
	// 'menu_name' => 'Destaques'
	// );
	// 
	// $args = array(
	// 'labels' => $labels,
	// 'public' => true,
	// 'public_queryable' => true,
	// 'show_ui' => true, 
	// 'query_var' => true,
	// 'rewrite' => true,
	// 'capability_type' => 'post',
	// 'has_archive' => true,
	// 'hierarchical' => false,
	// 'menu_position' => null, 
	// 'supports' => array('title','editor','thumbnail')
	// );
	// 
	// register_post_type( 'destaque-lateral' , $args );
	// flush_rewrite_rules();
	// }
	// 

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
// CustomPostType biblioteca
add_action('init', 'type_post_biblioteca');

// Labels
function type_post_biblioteca() {
$labels = array(
'name' => _x('Biblioteca', 'post type general name'),
'singular_name' => _x('Biblioteca', 'post type singular name'),
'add_new' => _x('Novo item de biblioteca', 'Novo item'),
'add_new_item' => __('Novo Item de biblioteca'),
'edit_item' => __('Editar Item de biblioteca'),
'new_item' => __('Novo Item de biblioteca'),
'view_item' => __('Ver Item de biblioteca'),
'search_items' => __('Procurar Item de biblioteca'),
'not_found' => __('Nenhum registro encontrado'),
'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
'parent_item_colon' => '',
'menu_name' => 'Item de biblioteca'
);

$args = array(
'labels' => $labels,
'public' => true,
'public_queryable' => true,
'show_ui' => true, 
'query_var' => true,
'rewrite' => true,
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => null, 
'supports' => array('title','editor','thumbnail')
);

register_post_type( 'biblioteca_item' , $args );
flush_rewrite_rules();
}
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
// Adiciona Taxonomia cat_biblioteca para organizar itens em diagnósticos, mapas, atas e legislação
register_taxonomy(
'cat_biblioteca',
'biblioteca_item',
array( 
'label' => 'Adicionar Categorias ',
'singular_label' => 'Categoria',
'rewrite' => true,
'hierarchical' => true,
// 'capabilities' => array(
//         'manage_terms' => 'nobody',
//         'edit_terms' => 'nobody',
//         'delete_terms' => 'nobody',
//     )
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
'biblioteca_item',
array( 
'label' => 'Adicionar Plano ',
'singular_label' => 'Categoria',
'rewrite' => true,
'hierarchical' => true,
// 'capabilities' => array(
//         'manage_terms' => 'nobody',
//         'edit_terms' => 'nobody',
//         'delete_terms' => 'nobody',
//     )
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
////////////////acf////////acf/////////////acf/////////////
///////////////////////////////////////////////////////////
	if(function_exists("register_field_group"))
	{
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