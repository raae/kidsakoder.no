<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>  
  <?php get_template_part('templates/content', get_post_type()); ?>
  </article>
<?php endwhile; ?>