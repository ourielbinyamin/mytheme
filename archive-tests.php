<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
          <h1>Les test de jeux</h1>
            <hr>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post rounded border shadow-sm p-3 mb-3">
                    <?php the_post_thumbnail(); ?>
                    <h2><?php the_title() ?></h2>
                    <p class="post_meta">
                        Publié le: <?php the_time(get_option('date_format')); ?>
                        par <?php the_author(); ?> - <?php comments_number(); ?>
                        <br>
                        <?php the_terms(get_the_ID(), 'type-jeux') ?>
                    </p>
                    <?php the_excerpt(); ?>
                    <p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                            Lire la suite
                        </a>
                    </p>
                </article>
            <?php endwhile; endif; ?>
        </div>
        <aside class="site-sidebar col-4 p-3 mb-3 rounded border shadow">
            <ul>
                <?php dynamic_sidebar('blog-sidebar') ?>
            </ul>
        </aside>
    </div>
    <div class="row">
        <div class="col-6">
            <?php previous_posts_link('Précédente'); ?>
        </div>
        <div class="col-6">
            <?php next_posts_link('Suivante'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
