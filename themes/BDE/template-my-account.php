<?php
/*
* Template Name: My Account
*/
?>

<?php get_header(); ?>

<div class="content">
    <?php the_content() ?>
</div>

<?php
if (is_user_logged_in()) :
    $events = get_user_event();
    if ($events->have_posts()) : ?>


        <h1 class="section-title">Mes evenements</h1>
        <div class="my-events">



            <?php
            bde_dashboard_events($events);
            ?>

        </div>


<?php
    endif;
endif;
?>

<?php get_footer(); ?>