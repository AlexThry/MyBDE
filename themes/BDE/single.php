<?php get_header() ?>

<section class="post">
    <div class="tags">
        <?php
        $tags = get_the_category();
        foreach ($tags as $tag) :
        ?>
            <span class="tag">
                <?php echo $tag->name ?>
            </span>
        <?php endforeach; ?>
    </div>
    <h1 class="title"><?php the_title() ?></h1>
    <hr>
    <div class="content">
        <?php the_content() ?>
    </div>

</section>

<?php get_footer() ?>