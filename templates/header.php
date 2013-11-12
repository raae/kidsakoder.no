<header class="page-header">
  <h1>
    <?php echo lkk_title(); ?>
  </h1>
  <?php if (is_single()): ?>
    <?php get_template_part('templates/entry-meta'); ?>
  <?php endif; ?>
</header>
