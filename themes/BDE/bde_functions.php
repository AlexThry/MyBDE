<?php

function get_last_event() {
    $events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 1,
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        )
    ));

    wp_reset_query();

    if ($events) {
        return $events;
    }

    return null;
}

function get_front_page_events() {
    $events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'date',
        'offset' => 1,
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        )
    ));

    wp_reset_query();

    if ($events) {
        return $events;
    }

    return null;
}

function get_upcomming_events() {
    $events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        )
    ));

    wp_reset_query();

    if ($events) {
        return $events;
    }

    return null;
}

function get_past_events() {
    $events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        )
    ));

    wp_reset_query();

    if ($events) {
        return $events;
    }

    return null;
}

function get_front_page_teams() {
    $teams = new WP_Query(array(
        'post_type' => 'team',
        'posts_per_page' => 3,
        'show_on_front_page' => true,
        'order' => 'DESC',
    ));
    
    wp_reset_query();

    if ($teams) {
        return $teams;
    }

    return null;

};

function get_all_teams() {
    $teams = new WP_Query(array(
        'post_type' => 'team',
        'posts_per_page' => 10,
        'order' => 'DESC',
    ));
    
    wp_reset_query();

    if ($teams) {
        return $teams;
    }

    return null;

};
