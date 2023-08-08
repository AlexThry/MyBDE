<?php get_header(); ?>

<section class="futur-events-section">
    <h1 class="section-title">
        Futurs Évènements
    </h1>
    <hr>
    <?php
    $upcomming_events = get_upcomming_events();

    while ($upcomming_events->have_posts()) : $upcomming_events->the_post();
    ?>

        <div class="event-card">
            <div class="event-card-info">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
                <h2 class="date">
                    <?php echo get_field('event_date') ?>, <?php echo get_field('event_location') ?>

                </h2>
                <p class="description">
                    <?php echo get_field('event_description') ?>
                </p>
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
            </div>
            <div class="event-card-img" style="background-image: url(<?php echo get_field('event_illustration') ?>;">

            </div>

            <div class="event-card-hover">
                <a href="<?php the_permalink() ?>" class="card-hover-text">
                    <h1 class="title">En voir plus</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 96 96" fill="none">
                        <g clip-path="url(#clip0_1_227)">
                            <path d="M48 16L42.36 21.64L64.68 44H16V52H64.68L42.36 74.36L48 80L80 48L48 16Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_227">
                                <rect width="96" height="96" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>

    <?php endwhile ?>

</section>

<?php get_footer(); ?>
