<?php
/*
Template Name: Groups Template
*/
?>

<?php get_template_part('single-jumbotron'); ?>

<header class="page-header">
  <h1>
    <?php _e('Groups', 'lkk') ?>
  </h1>
</header>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $posts = query_posts('post_type="lkk_group"&paged=' . $paged); ?>

<?php get_template_part('templates/loop'); ?>

<?php get_template_part('templates/pagination'); ?>

<?php wp_reset_query(); // reset the query ?>