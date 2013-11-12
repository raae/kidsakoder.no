<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>

<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'lkk'); ?>
    </div>
  <![endif]-->

  
  <?php do_action('get_header'); ?>
    
  <header class="site-header navbar navbar-default navbar-static-top <?php echo lkk_mobile_header_class(); ?>" role="banner">
    <div class="wrap">
  
      <?php get_template_part('templates/header-mobile-main-nav'); ?>
      
    </div>
  </header>


  <div class="wrap" role="document">
  
    <div class="row">
    

      <header class="site-header <?php echo lkk_side_header_class(); ?>" role="banner">
          <?php get_template_part('templates/header-side-main-nav'); ?>
      </header>
      
      <section class="main <?php echo lkk_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </section><!-- /.main -->
      
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo lkk_sidebar_class(); ?>" role="complementary">
          <?php dynamic_sidebar('sidebar-primary'); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    
    </div>
  
  </div><!-- /.wrap -->
  
  <footer class="site-footer <?php echo lkk_side_header_class(); ?>" role="complementary">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </footer>
  
  <?php wp_footer(); ?>

</body>
</html>
