<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>  
  <?php get_template_part('templates/content', 'single'); ?>
  </article>
<?php endwhile; ?>