<?php comments_template('/templates/header.php'); ?>

<div class="entry-content">
<?php the_content(); ?>
</div>

<footer>
  <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'lkk'), 'after' => '</p></nav>')); ?>
</footer>

<?php 
if('post' == get_post_type())
  comments_template('/templates/comments.php'); 
?>