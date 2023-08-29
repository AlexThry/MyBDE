<?php get_header() ?>

<?php

?>

    <section class="post">
        <?php
        $tags = get_the_category();
        display_tags($tags);
        ?>
        <h1 class="title"><?php the_title() ?></h1>
        <hr>
        <div class="content">
            <?php the_content() ?>
        </div>
        <?php bde_event_inscription_form(); ?>
    </section>

    <?php get_footer() ?>