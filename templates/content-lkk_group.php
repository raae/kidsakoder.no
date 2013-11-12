<?php comments_template('/templates/header.php'); ?>
<div class="row">
  <div class="entry-content <?php echo lkk_group_class() ?>">
  <?php the_content(); ?>
  </div>
  <div class="<?php echo lkk_group_class() ?>">
  <?php comments_template('/templates/lkk_group-info.php'); ?>
  <?php comments_template('/templates/lkk_group-contact.php'); ?>
  <?php comments_template('/templates/lkk_group-location.php'); ?>
  </div>
</row>

<footer>
  <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'lkk'), 'after' => '</p></nav>')); ?>
</footer>