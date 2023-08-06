<?php get_header() ?>

<section class="post">
    <h1 class="title"><?php the_title() ?></h1>
    <hr>
    <div class="content">
        <?php the_content() ?>
    </div>

</section>

<?php get_footer() ?>