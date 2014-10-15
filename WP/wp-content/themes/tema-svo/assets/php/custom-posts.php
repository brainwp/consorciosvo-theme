<?php function noticias_cpt() {
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

add_action( 'init', 'noticias_cpt', 1 );
?>