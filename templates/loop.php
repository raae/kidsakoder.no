<?php while (have_posts()) : the_post(); ?>
  <?php $index = $wp_query->current_post; ?>  

  <?php if($index % 2 == 0): ?>
    <div class="row">
  <?php endif; ?>

      <div class="<?php echo lkk_index_class(); ?>">
        <article <?php post_class(); ?>>  
        <?php get_template_part('templates/summary', get_post_format()); ?>
        </article>
      </div>
      
  <?php if($index % 2 == 1 || $index+1 == $wp_query->post_count): ?>
    </div>
  <?php endif; ?>    

<?php endwhile; ?>
