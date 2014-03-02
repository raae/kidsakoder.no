<?php if(ACF && get_field('contact_person_email') || get_field('contact_person_number' || get_field('contact_person_name') || get_field('contact_person_twitter'))): ?>

<div class="panel panel-default contact-person">
  <div class="panel-heading">
    <h3 class="panel-title"><?php _e('Group Contact', 'roots'); ?></h3>
  </div>
  <div class="panel-body">
    <?php if(get_field('contact_person_image')): ?>
    <?php $image = get_field('contact_person_image') ?>
    <img class="img-rounded" src="<?php echo $image['sizes']['thumbnail'] ?>"/>
    <?php endif; ?>
    
    <?php if(get_field('contact_person_name')): ?>    
    <h4><?php the_field('contact_person_name') ?></h4>
    <?php endif; ?>

    <dl>
      <?php if(get_field('contact_person_twitter')): ?>
      <dt><?php _e('Twitter', 'roots'); ?></dt>
      <dd><a href="http://twitter.com/<?php the_field('contact_person_twitter') ?>">@<?php the_field('contact_person_twitter') ?></a></dd>
      <?php endif; ?>
      
      <?php if(get_field('contact_person_email')): ?>
      <dt><?php _e('Email', 'roots'); ?></dt>
      <dd><a href="mailto:<?php the_field('contact_person_email') ?>"><?php the_field('contact_person_email') ?></a></dd>
      <?php endif; ?>
      
      <?php if(get_field('contact_person_number')): ?>
      <dt><?php _e('Phone number', 'roots'); ?></dt>
      <dd><a href="tel:<?php the_field('contact_person_number') ?>"><?php the_field('contact_person_number') ?></a></dd>
      <?php endif; ?>
    </dl>
  </div>
</div>

<?php endif; ?>