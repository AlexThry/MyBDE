<?php get_header(); ?>

<section class="teams-section">
    <h1 class="section-title">
        Futurs Évènements
    </h1>
    <hr>

    <?php
    $teams = get_all_teams();

    while ($teams->have_posts()) : $teams->the_post();
    ?>

        <div class="team-card" style="background-image: url(<?php echo get_field('team_illustration') ?>);">
            <div class="team-card-hover">
                <a href="<?php the_permalink() ?>" class="card-hover-text">
                    <h1 class="team-name">
                        <?php the_title(); ?>
                    </h1>
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