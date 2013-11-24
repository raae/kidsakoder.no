<?php while (have_posts()) : the_post(); ?>
  <?php if(get_the_content() != ""): ?>
  <div class="jumbotron">
    <article <?php post_class(); ?>>  
      <?php the_content(); ?>
    </article>
  </div>
  <?php endif; ?>
<?php endwhile; ?>