<?php
/*
Template Name: Home Template
*/
?>

<?php get_template_part('single-jumbotron'); ?>

<header class="page-header">
  <h1>
    <?php _e('News', 'lkk') ?>
  </h1>
</header>

<?php

$posts = query_posts('posts_per_page=6&post_type="post"'); ?>

<?php get_template_part('templates/loop'); ?>
  
<?php wp_reset_query(); // reset the query ?>
