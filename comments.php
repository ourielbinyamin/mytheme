<div class="col-12 rounded bg-white shadow p-3">
    <?php if(have_comments()) { ?>
    <h2 class="comments-title">
        <?php echo get_comments_number() ?>
    </h2>
    <ol class="list-unstyled">
        <?php
        //La fonction qui liste les commentaires
        wp_list_comments([
            'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 74
        ]);
        ?>
    </ol>
<?php } else {
 ?>
  <p class="comments_none">
        Il n'y à pas de commentaire pour le moment ! <br>
        Soyez le premier à participer !
    </p>
    <?php
}
comment_form(); //Le formualire d'ajout de commentaire ?>
</div>