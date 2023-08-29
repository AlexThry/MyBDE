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



function bde_add_user_to_event($user_id, $event_id)
{
    $attendees = get_post_meta($event_id, 'bde_event_attendees', true);
    if (!empty($attendees)) {
        $attendees_array = explode(',', $attendees);
    } else {
        $attendees_array = array();
    }
    if (!in_array($user_id, $attendees_array)) {
        $attendees_array[] = $user_id;
    }
    $attendees = implode(',', $attendees_array);
    update_post_meta($event_id, 'bde_event_attendees', $attendees);
}

function bde_remove_user_from_event($user_id = null, $event_id = null)
{
    if (!$user_id) {
        $user_id = $_GET['user_id'];
    }
    if (!$event_id) {
        $event_id = $_GET['event_id'];
    }
    $attendees = get_post_meta($event_id, 'bde_event_attendees', true);
    if (!empty($attendees)) {
        $attendees_array = explode(',', $attendees);
    } else {
        $attendees_array = array();
    }
    if (in_array($user_id, $attendees_array)) {
        $key = array_search($user_id, $attendees_array);
        unset($attendees_array[$key]);
    }
    $attendees = implode(',', $attendees_array);
    update_post_meta($event_id, 'bde_event_attendees', $attendees);
}

function bde_user_is_registered_to_event($user_id, $event_id)
{
    $attendees = get_post_meta($event_id, 'bde_event_attendees', true);
    if (!empty($attendees)) {
        $attendees_array = explode(',', $attendees);
    } else {
        $attendees_array = array();
    }
    if (in_array($user_id, $attendees_array)) {
        return true;
    }
    return false;
}

function bde_get_places_left($event_id, $place_limit)
{
    $attendees = get_post_meta($event_id, 'bde_event_attendees', true);
    if (!empty($attendees)) {
        $attendees_array = explode(',', $attendees);
    } else {
        $attendees_array = array();
    }
    $places_left = $place_limit - count($attendees_array);
    return $places_left;
}

function get_user_event()
{
    $user_id = get_current_user_id();
    $events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'bde_event_attendees',
                'compare' => 'LIKE',
                'value' => $user_id,
            )
        )
    ));

    wp_reset_query();

    if ($events) {
        return $events;
    }

    return null;
}

function bde_event_inscription_form()
{

    if (get_field('event_inscription_enabled')) {


        if (get_post_type() === 'event') {
            $event_location = get_field('event_location');
            $event_date = get_field('event_date');
            $event_time = get_field('event_time');
        }
        $attendees = get_post_meta(get_the_ID(), 'bde_event_attendees', true);
        if (!empty($attendees)) {
            $attendees_array = explode(',', $attendees);
        } else {
            $attendees_array = array();
        }
        foreach ($attendees_array as $attendee_id) {
            $attendee = get_userdata($attendee_id);
            if (!$attendee) {
                $key = array_search($attendee_id, $attendees_array);
                unset($attendees_array[$key]);
            }
        }
        $attendees = implode(',', $attendees_array);
        update_post_meta(get_the_ID(), 'bde_event_attendees', $attendees);

        if (get_field('event_inscription_enabled')) :
            $place_limit = get_field('place_limit');
            $event_price = get_field('event_price');

            if (isset($_POST['submit'])) {
                $event_id = get_the_ID();
                $user_id = get_current_user_id();
                if (isset($_POST['inscription'])) {
                    $inscription = true;
                } else {
                    $inscription = false;
                }
                if ($inscription) {
                    bde_add_user_to_event($user_id, $event_id);
                } else {
                    bde_remove_user_from_event($user_id, $event_id);
                }
            }
?>
            <hr>
            <div class="event-inscription">
                <h1>Réservation</h1>
                <p>Lieu : <?php echo $event_location ?></p>
                <p>Date : <?php echo $event_date ?></p>
                <?php if ($event_time) : ?>
                    <p>Heure : <?php echo $event_time ?></p>
                <?php endif ?>
                <?php
                if (get_field('place_limit')) {
                    $place_limit = get_field('place_limit');
                }
                $places_left = bde_get_places_left(get_the_ID(), $place_limit);
                ?>
                <?php if ($place_limit) : ?>
                    <p>Nombre de places restantes : <?php echo $places_left ?></p>
                <?php endif ?>
                <p>Prix : <?php echo $event_price ?> (à payer au BDE)</p>

                <?php if ($places_left > 0) : ?>
                    <form action="<?php the_permalink() ?>" method="post" id="event-inscription-form">
                        <?php
                        $user_is_attendee = bde_user_is_registered_to_event(get_current_user_id(), get_the_ID());
                        ?>
                        <label for="inscription">Je réserve : </label>
                        <input type="checkbox" class="checkbox" name="inscription" <?php echo $user_is_attendee ? 'checked' : '' ?>>
                        <input type="submit" name="submit" value="confirmer">
                    </form>
                <?php else : ?>
                    <p class="user-message error">Il n'y a plus de places disponibles pour cet évènement</p>
                <?php endif ?>

                <?php
                if (isset($_POST['submit'])) {
                    if ($user_is_attendee) {
                        echo "<p class='user-message success'>Vous êtes bien inscrit à l'évènement</p>";
                    } else {
                        echo "<p class='user-message success'>Vous êtes bien désinscrit de l'évènement</p>";
                    }
                }
                ?>
            </div>

        <?php endif;
    }
}

function bde_inscrits_page_callback()
{
    $events = get_posts(array(
        'post_type' => 'event',
        'posts_per_page' => -1,
    ));

    // Vérifier si un événement a été sélectionné
    if (isset($_POST['event_id'])) {
        $event_id = $_POST['event_id'];

        // Récupérer la liste des inscrits pour l'événement sélectionné
        $attendees = get_post_meta($event_id, 'bde_event_attendees', true);
        if (!empty($attendees)) {
            $attendees_array = explode(',', $attendees);
        } else {
            $attendees_array = array();
        }
        foreach ($attendees_array as $attendee_id) {
            $attendee = get_userdata($attendee_id);
            if (!$attendee) {
                $key = array_search($attendee_id, $attendees_array);
                unset($attendees_array[$key]);
            }
        }
        $attendees = implode(',', $attendees_array);
        update_post_meta(get_the_ID(), 'bde_event_attendees', $attendees);
        if (!empty($attendees)) {
            $attendees_array = explode(',', $attendees);
        } else {
            $attendees_array = array();
        }

        // Afficher la liste des inscrits
        if (!empty($attendees_array)) { ?>
            <input type="text" id="search-custom" placeholder="Rechercher par nom...">
            <h2>Inscrits pour l'événement sélectionné :</h2>
            <table class="custom">
                <tr>
                    <th>Nom</th>
                    <th>Adhérant</th>
                    <th>Email</th>
                    <th>Formation</th>
                    <th>Année</th>
                </tr>
                <?php
                foreach ($attendees_array as $attendee_id) {
                    $attendee = get_userdata($attendee_id);
                    if ($attendee) : ?>
                        <tr class="user-row">
                            <td><?php echo $attendee->first_name . ' ' . $attendee->last_name ?></td>
                            <td><?php echo get_user_meta($attendee_id, 'user_registration_adherent', true) ?></td>
                            <td><?php echo $attendee->user_email ?></td>
                            <td><?php echo get_user_meta($attendee_id, 'user_registration_specialitee', true) ?></td>
                            <td><?php echo get_user_meta($attendee_id, 'user_registration_annee', true) ?></td>
                        </tr>
                <?php
                    endif;
                }
                ?>
            </table>
    <?php
            $csv_file = fopen('inscrits.csv', 'w');
            fputcsv($csv_file, array('Prénom', 'Nom', 'Email', 'Formation', 'Année', 'Adhérent'));
            foreach ($attendees_array as $attendee_id) {
                $attendee = get_userdata($attendee_id);
                $first_name = $attendee->first_name;
                $last_name = $attendee->last_name;
                $email = $attendee->user_email;
                $formation = get_user_meta($attendee_id, 'user_registration_specialitee', true);
                $year = get_user_meta($attendee_id, 'user_registration_annee', true);
                $adherent = user_can($attendee_id, 'adherent') ? 'oui' : 'non';
                fputcsv($csv_file, array($first_name, $last_name, $email, $formation, $year, $adherent));
            }
            fclose($csv_file);
            echo '<a href="inscrits.csv" download="inscrits.csv">Télécharger la liste des inscrits</a>';
        } else {
            echo '<p>Aucun inscrit pour l\'événement sélectionné.</p>';
        }
    }
    ?>

    <h2>Sélectionner un événement :</h2>

    <form method="post">
        <select name="event_id">
            <?php foreach ($events as $event) : ?>
                <option value="<?php echo $event->ID; ?>"><?php echo $event->post_title; ?></option>
            <?php endforeach; ?>
        </select>
        <input class="custom" type="submit" value="Afficher les inscrits">
    </form>
<?php
}


function bde_promote_user_adherent($user_id)
{
    $user = get_userdata($user_id);
    $user->add_role('adherent');
}

function bde_demote_user_adherent($user_id)
{
    $user = get_userdata($user_id);
    $user->remove_role('adherent');
}

function bde_promote_user_author($user_id)
{
    $user = get_userdata($user_id);
    $user->add_role('author');
}

function bde_demote_user_author($user_id)
{
    $user = get_userdata($user_id);
    $user->remove_role('author');
}

function bde_modify_users_callback()
{

    $users = get_users(array(
        'role__not_in' => array('administrator')
    ));

    if (isset($_POST['submit'])) {
        foreach ($users as $user) {
            $user_id = $user->ID;
            if (isset($_POST[$user_id . 'adherent'])) {
                bde_promote_user_adherent($user_id);
            } else {
                bde_demote_user_adherent($user_id);
            }
            if (isset($_POST[$user_id . 'auteur'])) {
                bde_promote_user_author($user_id);
            } else {
                bde_demote_user_author($user_id);
            }
        }
    }

?>

    <form method="post">
        <input type="text" id="search-custom" placeholder="Rechercher par nom...">


        <table class="custom">
            <tr>
                <th>Nom</th>
                <th>Adhérent</th>
                <th>Auteur</th>
            </tr>
            <?php foreach ($users as $user) :
                $user_id = $user->ID;
            ?>
                <tr class="user-row">
                    <td><?php echo $user->first_name . ' ' . $user->last_name ?></td>
                    <td><input type="checkbox" name="<?php echo $user_id ?>adherent" <?php echo user_can($user_id, 'adherent') ? 'checked' : '' ?>></td>
                    <td><input type="checkbox" name="<?php echo $user_id ?>auteur" <?php echo user_can($user_id, 'author') ? 'checked' : '' ?>></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input class="custom" type="submit" name="submit" value="confirmer">
    </form>

<?php
}

function bde_dashboard_events($events)
{
    if (isset($_POST['submit']))
    // utiliser la fonction bde_remove_user_from_event($user_id, $event_id) pour chaque event coché
    {
        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                bde_remove_user_from_event(get_current_user_id(), $key);
            }
        }
        exit;
    }
?>
    <form class="dashboard-event-form" action="<?php site_url("/my-account") ?>" method="post">

        <?php
        while ($events->have_posts()) :
            $events->the_post();
            $event_name = get_the_title();
            $event_id = get_the_ID();
        ?>
            <div class="event-dashboard">
                <h1><a href="<?php the_permalink() ?>"><?php echo $event_name ?></a></h1>
                <div class="check">
                    <label for="<?php echo $event_id ?>">Se désinscrire ?</label>
                    <input type="checkbox" name="<?php echo $event_id ?>" id="<?php echo $event_id ?>">
                </div>
            </div>

        <?php
        endwhile; ?>
        <input type="submit" name="submit">

    </form>
<?php
}
