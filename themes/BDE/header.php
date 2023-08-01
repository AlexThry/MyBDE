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
        <a href="#header">
            <h1 class="nav-title">
                MyBDE
            </h1>
        </a>
        <div class="nav-buttons">
            <a href="#body" class="light-button">Home</a>
            <a href="#events-section" class="light-button">Evenements</a>
            <a href="#teams-section" class="light-button">Mon BDE</a>
            <a href="" class="button sign-in-button">Sign-in</a>
            <a href="" class="connection-button"><span>Connect</span></a>
        </div>
    </nav>
    
