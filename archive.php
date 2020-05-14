<?php get_header(); ?>

    <?php
    if(is_category()){
        echo "<h1>Catégorie: ".single_cat_title('', false)."</h1>";
    }
    elseif(is_tag()){
        echo "<h1>étiquette: ".single_tag_title('', false)."</h1>";
    }
    elseif(is_search()){
        echo "<h1>votre recherche: ".get_search_query()."</h1>";
    }
    else{echo 'le blog';} ?>
    
    <h1>Liste des articles</h1>

    <?php if(have_posts()): while (have_posts()): the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>

            <?php the_post_thumbnail(); ?>

            <p class="post_meta">
                publié le <?php the_time(get_option('date_format')); ?>
                par <?php the_author(); ?> . <?php comments_number(); ?>
            </p>

            <?php the_excerpt(); ?>

            <p>
                <a href="<?php the_permalink(); ?>" class="post_link">Lire la suite</a>
            </p>
        </article>
        
        <?php endwhile; endif; ?>
            <aside>
                <ul>
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                </ul>
            </aside>
            <div class="row">
                <div class="col-6">
                    <?php previous_posts_link('précédent'); ?>
                </div>
                <div class="col-6">
                    <?php next_posts_link('suivant'); ?>
                </div>
            </div>

<?php get_footer(); 