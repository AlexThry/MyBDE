<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <?php wp_head() ?>
</head>
<body id="body" <?php body_class() ?>>
    <nav class="navbar">
        <a href="<?= is_front_page() ? "#header" : site_url()  ?>">
            <h1 class="nav-title">
                MyBDE
            </h1>
        </a>
        <div class="nav-buttons">
            <?php if (is_front_page()) : ?>
            <a href="#body" class="light-button">Home</a>
            <a href="#events-section" class="light-button">Evenements</a>
            <a href="#teams-section" class="light-button">Mon BDE</a>
            <?php endif ?>
            <a href="" class="button sign-up-button">Sign-up</a>
            <a href="" class="connection-button"><span>Connect</span></a>
        </div>
    </nav>
    
