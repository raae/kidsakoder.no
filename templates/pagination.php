<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <?php if('post' == get_post_type()): ?>
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      <?php elseif('lkk_group' == get_post_type()): ?>
        <?php
          global $wp_query;
          
          $big = 999999999; // need an unlikely integer
          
          echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages
          ) );
        ?>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>