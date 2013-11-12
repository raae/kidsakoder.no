<?php if(ACF && get_field('contact_person_email') || get_field('contact_person_number')): ?>

<div class="panel panel-default contact-person">
  <div class="panel-heading">
    <h3 class="panel-title"><?php _e('Group Contact', 'lkk'); ?></h3>
  </div>
  <div class="panel-body">
    <?php if(get_field('contact_person_image')): ?>
    <img class="img-rounded" src="<?php echo get_field('contact_person_image')['sizes']['thumbnail'] ?>"/>
    <?php endif; ?>
    
    <?php if(get_field('contact_person_name')): ?>    
    <h4><?php the_field('contact_person_name') ?></h4>
    <?php endif; ?>

    <dl>
      <?php if(get_field('contact_person_email')): ?>
      <dt><?php _e('Email', 'lkk'); ?></dt>
      <dd><?php the_field('contact_person_email') ?></dd>
      <?php endif; ?>
      <?php if(get_field('contact_person_number')): ?>
      <dt><?php _e('Phone number', 'lkk'); ?></dt>
      <dd><?php the_field('contact_person_number') ?></dd>
      <?php endif; ?>
    </dl>
  </div>
</div>

<?php endif; ?>