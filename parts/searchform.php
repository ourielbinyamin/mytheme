<form action="<?=home_url('/')?>" method="get">
    <input type="text" id="search" name="s" value="<?= the_search_query();?>">
    <button class="btn-warning rounded-pill" type="submit">Rechercher</button>
</form>