<?php 

include_once('bde_functions.php');

function bde_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form'));
}

add_action('after_setup_theme', 'bde_theme_support');

function bde_enqueue_styles() {
    wp_enqueue_style('bde-main-style', get_theme_file_uri('/src/css/main.css'), null, microtime());
}

add_action('wp_enqueue_scripts', 'bde_enqueue_styles');

function bde_enqueue_scripts() {
    wp_enqueue_script('bde-main-script', get_theme_file_uri('/src/js/main.js'), null, microtime(), true);
}

add_action('wp_enqueue_scripts', 'bde_enqueue_scripts');

function bde_custom_post_types() {
    register_post_type('event', array(
        'public' => true,
        'labels' => array(
            'name' => 'Evenements',
            'add_new_item' => 'Ajouter un nouvel evenement',
            'edit_item' => 'Modifier l\'evenement',
            'all_items' => 'Tous les evenements',
            'singular_name' => 'Enevement',
        ),
        'has_archive' => 'events',
        'taxonomies' => array('category'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields'
        )
    ));

    register_post_type('team', array(
        'public' => true,
        'labels' => array(
            'name' => 'Equipes',
            'add_new_item' => 'Ajouter une nouvelle equipe',
            'edit_item' => 'Modifier l\'equipe',
            'all_items' => 'Toutes les equipes',
            'singular_name' => 'Equipe',
        ),
        'has_archive' => 'teams',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'custom-fields'
        )
    ));
}

add_action('init', 'bde_custom_post_types');