<header class="page-header">
  <h1>
    <?php echo lkk_title(); ?>
  </h1>
  <?php if(is_single() && 'post' == get_post_type()): ?>
    <?php get_template_part('templates/entry-meta'); ?>
  <?php endif; ?>
</header>
