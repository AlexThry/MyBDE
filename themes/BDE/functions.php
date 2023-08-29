<?php

include_once('bde_functions.php');

function bde_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form'));
}

add_action('after_setup_theme', 'bde_theme_support');

function bde_enqueue_styles()
{
    wp_enqueue_style('bde-main-style', get_theme_file_uri('/src/css/main.css'), null, microtime());
}

add_action('wp_enqueue_scripts', 'bde_enqueue_styles');

function bde_enqueue_admin_styles()
{
    wp_enqueue_style('bde-admin-style', get_theme_file_uri('/src/css/admin.css'), null, microtime());
}

add_action('admin_enqueue_scripts', 'bde_enqueue_admin_styles');

function bde_enqueue_scripts()
{
    wp_enqueue_script('bde-main-script', get_theme_file_uri('/src/js/main.js'), null, microtime(), true);
}

add_action('wp_enqueue_scripts', 'bde_enqueue_scripts');

function bde_admin_enqueue_scripts()
{
    wp_enqueue_script('bde-admin-script', get_theme_file_uri('/src/js/admin.js'), null, microtime(), true);
}

add_action('admin_enqueue_scripts', 'bde_admin_enqueue_scripts');

function bde_custom_post_types()
{
    register_post_type('event', array(
        'public' => true,
        'capability_type' => 'event',
        'map_meta_cap' => true,
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
        'capability_type' => 'team',
        'map_meta_cap' => true,
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


//redirect subscriber accounts out of admin and onto homepage

add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
    $user = wp_get_current_user();
    if ((current_user_can('subscriber') || current_user_can('adherant')) && (!current_user_can('administrator') || !current_user_can('author'))) {
        wp_redirect(site_url('/my-account'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
    $user = wp_get_current_user();
    if ((current_user_can('administrator') || current_user_can('author'))) {
        show_admin_bar(true);
    } else {
        show_admin_bar(false);
    }
}


add_filter('login_headerurl', 'bdeHeaderUrl');

function bdeHeaderUrl()
{
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'bdeLoginCSS');

function bdeLoginCSS()
{
    bde_enqueue_styles();
}

$register_link = site_url('/registration');


function bde_save_event_attendees($post_id)
{
    if (array_key_exists('bde_event_attendees', $_POST)) {
        update_post_meta(
            $post_id,
            'bde_event_attendees',
            sanitize_text_field($_POST['bde_event_attendees'])
        );
    }
}

add_action('save_post_event', 'bde_save_event_attendees');

function bde_menu_pages()
{
    if (current_user_can('administrator') || current_user_can('author')) {
        add_menu_page(
            'Inscriptions',
            'Inscriptions',
            'list_users',
            'inscription',
            'bde_inscrits_page_callback',
            'dashicons-tickets-alt',
            12
        );

        add_menu_page(
            'Modifier Utilisateurs',
            'Modifier Utilisateurs',
            'list_users',
            'modify_users',
            'bde_modify_users_callback',
            'dashicons-admin-generic',
            10
        );
    }


    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
    remove_menu_page('tools.php');
}

add_action('admin_menu', 'bde_menu_pages');
