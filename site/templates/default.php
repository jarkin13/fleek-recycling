<?php snippet('header') ?>

    <div class="container">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>

<?php snippet('footer') ?>