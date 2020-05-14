<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="row">
    <div class="col search">
        <?php get_template_part('parts/searchform');?>
    </div>
        <?php
            wp_nav_menu([
                'theme-location' => 'principal',
                'container' => 'ul',
                'menu_class' => 'site_header_menu' // Ma classe personnalisée
            ]);
        ?>
    
    <div class="col">
    <a href="<?php echo home_url('/') ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" height="100px" alt="Logo">
    </a>
    </div>
    </div>
</header>
<?php wp_body_open(); 