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
            <?php if (is_user_logged_in()) : ?>
                <a href="" class="button sign-up-button">Mon profile</a>
                <a href="<?php echo wp_logout_url( home_url() ) ?>" class="connection-button"><span>Logout</span></a>
            <?php else : ?>
                <a href="<?php echo wp_registration_url() ?>" class="button sign-up-button">Sign-up</a>
                <a href="<?php echo wp_login_url() ?>" class="connection-button"><span>Login</span></a>
            <?php endif ?>

        </div>
    </nav>