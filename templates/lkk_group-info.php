<?php if(ACF): ?>

<div class="panel panel-default info">
  <div class="panel-heading">  
    <h3 class="panel-title">
    <?php 
    if(get_field('group_type') == 'local')
      _e('Local Group', 'roots');
    elseif(get_field('group_type') == 'code_club')
      _e('Code Club', 'roots');
    elseif(get_field('group_type') == 'tech')
      printf(__('Tech Group: %s', 'roots'), get_field('group_techology'));
    else
      printf(__('Group: %s', 'roots'), get_field('group_description'));
    ?>
    </h3>
  </div>
  
  <div class="panel-body">
  <?php if(get_field('links')): ?>
  	<ul>
  	<?php while(has_sub_field('links')): ?>
      <?php if(get_sub_field('link_type') == 'meetup_group'): ?>
    		<li><a href="http://meetup.com/<?php the_sub_field('meetup_id'); ?>"><?php the_sub_field('link_label'); ?></a></li>
      <?php endif; ?>
      <?php if(get_sub_field('link_type') == 'facebook_group'): ?>
    		<li><a href="http://facebook.com/<?php the_sub_field('facebook_group_id'); ?>"><?php the_sub_field('link_label'); ?></a></li>
      <?php endif; ?>
      <?php if(get_sub_field('link_type') == 'facebook_page'): ?>
    		<li><a href="http://facebook.com/<?php the_sub_field('facebook_page_id'); ?>"><?php the_sub_field('link_label'); ?></a></li>
      <?php endif; ?>
      <?php if(get_sub_field('link_type') == 'other'): ?>
    		<li><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('link_label'); ?></a></li>
      <?php endif; ?>   
  	<?php endwhile; ?>
  	</ul>
  <?php endif; ?>
  </div>
</div>

<?php endif; ?>