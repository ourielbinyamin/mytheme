<?php

//Ajouter la prise en charge des images mise en avant
add_theme_support('post-thumbnails');
set_post_thumbnail_size('100vw','400px',true);
add_image_size('square',500,500,false);

//Ajouter automatiquement le titre du site
add_theme_support('title-tag');

//On déclare les emplacements de menu
register_nav_menus([
    'principal' => 'Menu Principal',
    'footer' => 'Bas de page'
]);

//On déclare ma sidebar
register_sidebar(
    [
        'id' => 'blog-sidebar',
        'name' => 'La sidebar du Blog'
    ]
);

//Cette fonction me permet de retirer des éléments inutiles de l'admin WP.
function mytheme_remove_menu_pages()
{
    remove_menu_page('tools.php');
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'mytheme_remove_menu_pages');

function mytheme_register_assets()
{
    //Déclarer jQuery
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        false,
        '3.3.1',
        true
    );

    //Déclarer Boostrap JS
    wp_enqueue_script(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
        ['jquery'],
        '4.4.1',
        true
    );

    //Déclarer Boostrap CSS
    wp_enqueue_style(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css',
        false,
        '4.4.1'
    );

    //On charge le style.css du thème
    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri()
    );

    //On charge notre style perso
    wp_enqueue_style(
        'mytheme-custom-style',
        get_template_directory_uri() . '/assets/css/main.css',
        false,
        1.0
    );
}
add_action('wp_enqueue_scripts','mytheme_register_assets');

function mytheme_register_post_types() {
    //Déclaration des CPT et Taxonomies ira ici

    $labels = [
        'name' => 'tests',
        'all_items' => 'Tous les tests',
        'singular_name' => 'Test',
        'add_new_item' => 'Ajouter un test',
        'edit_item' => 'Modifier le test',
        'menu_name' => 'Tests'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => ['title','editor','thumbnail','comments'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer'
    ];

    register_post_type('tests',$args);

    //Déclaration de la Taxonomie
    $labels = [
        'name' => 'type-jeux',
        'new_item_name' => 'Nom du nouveau type de jeux',
        'parent_item' => 'Nom du jeux parent',
        'menu_name' => 'Type de jeux'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierachical' => true
    ];

    register_taxonomy('type-jeux','tests',$args);

}
add_action('init','mytheme_register_post_types');
