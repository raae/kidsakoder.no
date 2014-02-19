<?php comments_template('/templates/header.php'); ?>

<div class="entry-content">
  <?php the_content(); ?>
</div>

<?php if(wp_link_pages(array('echo' => 0)) || 'post' == get_post_type()): ?>

  <footer class="panel panel-default">
    
    <?php if('post' == get_post_type()): ?> 
      <?php wp_link_pages(array('before' => '<nav class="page-nav panel-heading">' . __('Pages:', 'lkk'), 'after' => '</nav>')); ?>
    <?php else: ?>
      <?php wp_link_pages(array('before' => '<nav class="page-nav panel-body">' . __('Pages:', 'lkk'), 'after' => '</nav>')); ?>
    <?php endif; ?>
    
    <?php if('post' == get_post_type()): ?> 
      <div class="panel-body">
        <?php get_template_part('templates/entry-meta'); ?>
      </div>
    <?php endif; ?>
    
  </footer>

<?php endif; ?>

<?php 
if('post' == get_post_type())
  comments_template('/templates/comments.php'); 
?>