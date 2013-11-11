<?php comments_template('/templates/header.php'); ?>

<?php the_content(); ?>

<footer>
  <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
</footer>

<?php 
if(is_single())
  comments_template('/templates/comments.php'); 

?>