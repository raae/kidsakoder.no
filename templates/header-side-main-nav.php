<a class="brand" href="<?php echo home_url(); ?>/">
  <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>" />
</a>
<nav class="nav-main" role="navigation">
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills nav-stacked'));
    endif;
  ?>
</nav>
