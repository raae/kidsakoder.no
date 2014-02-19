<?php
/*
Template Name: Map Template
*/
?>

<?php get_template_part('single-jumbotron'); ?>

<header class="page-header">
  <h1>
    <?php _e('Group Map', 'lkk') ?>
  </h1>
</header>

<?php $posts = query_posts('post_type="lkk_group"&posts_per_page=-1'); ?>

<script type="text/javascript">
  var groupLocations = [];  
</script>

<?php while (have_posts()) : the_post(); ?>
  <?php if(ACF && get_field('group_location')): ?>
  <?php $location = get_field('group_location')?>
  <script type="text/javascript">
    groupLocations.push({
      address: '<?php echo $location['address']; ?>',
      coordinates: [<?php echo $location['coordinates']; ?>],
      info: '<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>'
    });   
  </script>
  <?php endif; ?>
<?php endwhile; ?>

<div class="groups map">

</div>