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

function get_tag_color($tag) {
    switch ($tag->name) {
        case "Annecy/Chambéry":
            $color = "#d0006f";
            break;
        case "Clermont-Ferrand":
            $color = "#7fc241";
            break;
        case "Grenoble":
            $color = "#b89773";
            break;
        case "Lille":
            $color = "#ed1a3b";
            break;
        case "Marseille":
            $color = "#05aabc";
            break;
        case "Montpellier":
            $color = "#2883c5";
            break;
        case "Nantes":
            $color = "#ffdc00";
            break;
        case "Nice":
            $color = "#bfd632";
            break;
        case "Orléans":
            $color = "#f7931d";
            break;
        case "Paris":
            $color = "#9593ab";
            break;
        case "Tours":
            $color = "#a153a1";
            break;
        default:
            $color = "#d0006f";
    }

    return $color;
}

function display_tags($tags) {
    if ($tags) {
        echo "<div class='tags'>";
        
        foreach ($tags as $tag) {
            $color = get_tag_color($tag);
            echo "<span class='tag' style='background-color: $color'>$tag->name</span>";
        }
        echo "</div>";
    }
}
