<?php get_template_part('templates/header', 'single'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<?php while (have_posts()) : the_post(); ?>
  <?php $index = $wp_query->current_post; ?>  

  <?php if($index % 2 == 0): ?>
    <div class="row">
  <?php endif; ?>

      <div class="<?php echo roots_index_class(); ?>">
        <article <?php post_class(); ?>>  
        <?php get_template_part('templates/content', get_post_format()); ?>
        </article>
      </div>
      
  <?php if($index % 2 == 1 || $index+1 == $wp_query->post_count): ?>
    </div>
  <?php endif; ?>    

<?php endwhile; ?>


<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
