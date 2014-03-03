<?php while (have_posts()) : the_post(); ?>

    <div class="row">
      <div class="<?php echo lkk_index_class(); ?>">
        <article <?php post_class(); ?>>  
        <?php get_template_part('templates/summary', get_post_format()); ?>
        </article>
      </div>
    </div>

<?php endwhile; ?>
