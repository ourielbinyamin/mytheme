<?php get_header(); ?>

    <?php if(have_posts()): while (have_posts()): the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <?php if(is_user_logged_in()):
            get_currentuserinfo();
            echo'<h2>Bonjour '.$current_user->user_login.'</h2>';
        else: echo 'Bonjour';
    endif;?>

        <?php the_content(); ?>

    <?php endwhile; endif; ?>

<?php get_footer(); 