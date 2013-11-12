<?php
/*
Template Name: Home Template
*/
?>

<div class="jumbotron">
  <?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>  
    <?php the_content(); ?>
  </article>
  <?php endwhile; ?>
</div>

<header class="page-header">
  <h1>
    <?php _e('Recent Posts', 'lkk') ?>
  </h1>
</header>

<?php global $query_string; // required
$posts = query_posts($query_string.'&posts_per_page=6&post_type="post"'); ?>

<?php get_template_part('templates/loop'); ?>
  
<?php wp_reset_query(); // reset the query ?>

<nav class="post-nav">
  <ul class="pager">
    <li class="next"><a href="<?php echo get_page_uri(get_option( 'page_for_posts')); ?>"><?php _e('Read the rest of the posts &rarr;', 'lkk'); ?></a></li>
  </ul>
</nav>
