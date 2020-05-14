<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="w-100 tb shadow">
       <?php the_post_thumbnail('square'); ?>
   </div>
    <div class="container p-5">
        <article class="post">

            <h1><?php the_title(); ?></h1>

            <div class="post_meta">
                <span style="float:left"> <?php echo get_avatar(get_the_author_meta('ID'), 40); ?></span>
                <p>
                    Publié le: <?php the_time(get_option('date_format')); ?> <br>
                    par <?php the_author(); ?> - <?php comments_number(); ?><br>
                    Dans la catégorie <?php the_category(); ?><br>
                    Avec les étiquettes <?php the_tags(); ?>
                </p>
            </div>
            <div class="post_content">
                <?php the_content(); ?>
            </div>
            <div class="row bg-light">
                <div class="col-6">
                    <strong>Avis:</strong>
                    <?php echo get_post_meta(get_the_ID(),'avis',true) ?>
                </div>
                <div class="col-6">
                    <strong>Note:</strong>
                    <?php echo get_post_meta(get_the_ID(),'note',true) ?> /10
                </div>
                <div class="col-6 bg-success">
                    <strong>Les plus:</strong>
                    <?php echo get_post_meta(get_the_ID(),'plus',true) ?>
                </div>
                <div class="col-6 bg-danger">
                    <strong>Les moins:</strong>
                    <?php echo get_post_meta(get_the_ID(),'moins',true) ?>
                </div>
            </div>
        </article>
        <div class="row mt-3">
            <?php comments_template(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
