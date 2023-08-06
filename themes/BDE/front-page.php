<?php get_header() ?>


<header id="header" class="header">

    <div class="scroll-replacer">
        <span class="scroll-content">
            Nouveau
        </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
            </svg>
    </div>

    <div class="scroll-wrapper">
        <div class="scroll-message-left">
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
        </div>
        <div class="scroll-message-left">
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
        </div>
    </div>

    <?php
    $last_event = get_last_event();
    while ($last_event->have_posts()) : $last_event->the_post()
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
            <div class="event-card-img" style="background-image: url(<?php echo get_field('event_illustration') ?>);">

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

    <?php endwhile; ?>

    <div class="scroll-replacer">
        <span class="scroll-content">
            Nouveau
        </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
            </svg>
    </div>

    <div class="scroll-wrapper">
        <div class="scroll-message-right">
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
        </div>
        <div class="scroll-message-right">
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
            <span class="scroll-content">
                Nouveau
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="scroll-content" width="80" height="64" viewBox="0 0 80 64" fill="none">
                    <path d="M72 0H8C3.56 0 0.04 3.56 0.04 8L0 56C0 60.44 3.56 64 8 64H72C76.44 64 80 60.44 80 56V8C80 3.56 76.44 0 72 0ZM26 44H21.2L11 30V44H6V20H11L21 34V20H26V44ZM46 25.04H36V29.52H46V34.56H36V39H46V44H30V20H46V25.04ZM74 40C74 42.2 72.2 44 70 44H54C51.8 44 50 42.2 50 40V20H55V38.04H59.52V23.96H64.52V38H69V20H74V40Z" />
                </svg>
            </span>
        </div>
    </div>
</header>

<section id="events-section" class="events">
    <h1 class="section-title">
        Futurs Évènements
    </h1>
    <hr>

    <?php
    $front_page_events = get_front_page_events();
    if ($front_page_events->have_posts()) :
        while ($front_page_events->have_posts()) : $front_page_events->the_post(); ?>
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

        <?php endwhile; ?>

        <div class="see-more">
            <a href="<?php echo site_url('/events') ?>">
                En voir plus
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 96 96" fill="none">
                <g clip-path="url(#clip0_1_227)">
                    <path d="M48 16L42.36 21.64L64.68 44H16V52H64.68L42.36 74.36L48 80L80 48L48 16Z" />
                </g>
                <defs>
                    <clipPath id="clip0_1_227">
                        <rect width="96" height="96" />
                    </clipPath>
                </defs>
            </svg>
        </div>

    <?php else : ?>

        <h1 class="not-found-error">
            Il n'y a pas d'évènements à venir :/
        </h1>

    <?php endif; ?>

</section>

<section id="teams-section" class="teams">
    <h1 class="section-title">
        Les équipes du BDE
    </h1>
    <hr>

    <?php
    $front_page_teams = get_front_page_teams();
    ?>

    <?php while ($front_page_teams->have_posts()) : $front_page_teams->the_post() ?>

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


    <?php endwhile; ?>

    <div class="see-more">
        <a href="<?php echo site_url('/teams') ?>">
            En voir plus
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 96 96" fill="none">
            <g clip-path="url(#clip0_1_227)">
                <path d="M48 16L42.36 21.64L64.68 44H16V52H64.68L42.36 74.36L48 80L80 48L48 16Z" />
            </g>
            <defs>
                <clipPath id="clip0_1_227">
                    <rect width="96" height="96" />
                </clipPath>
            </defs>
        </svg>
    </div>


</section>

<?php get_footer(); ?>