<?php

function get_last_event()
{
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

function get_front_page_events()
{
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

function get_upcomming_events()
{
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

function get_past_events()
{
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

function get_front_page_teams()
{
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

function get_all_teams()
{
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

function get_tag_color($tag)
{
    switch ($tag->name) {
        case "Event rézo":
            $color = "linear-gradient(130deg, #8D89A5, #8C4799, #D0006F, #BF0D3E, #E87722, #FFCD00, #C4D600, #78BE20)";
            break;
        case "Clermont-Ferrand":
            $color = "#78BE20";
            break;
        case "Grenoble":
            $color = "#AA8066";
            break;
        case "Lille":
            $color = "#BF0D3E";
            break;
        case "Marseille":
            $color = "#008EAA";
            break;
        case "Montpellier":
            $color = "#418FDE";
            break;
        case "Nantes":
            $color = "#FFCD00";
            break;
        case "Nice":
            $color = "#C4D600"; 
            break;
        case "Orléans":
            $color = "#E87722";
            break;
        case "Paris":
            $color = "#8D89A5";
            break;
        case "Tours":
            $color = "#8C4799";
            break;
        default:
            $color = "#D0006F";
    }
    return $color;
}

function display_tags($tags)
{
    if ($tags) {
        echo "<div class='tags'>";
        
        foreach ($tags as $tag) {
            $color = get_tag_color($tag);
            echo "<span class='tag' style='background: $color'>$tag->name</span>";
        }
        echo "</div>";
    }
}
