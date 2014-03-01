<?php get_template_part('templates/header', 'single'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php get_template_part('templates/loop'); ?>

<?php get_template_part('templates/pagination'); ?>