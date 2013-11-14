<?php if(ACF && get_field('group_location')): ?>

<script type="text/javascript">
  var groupLocation = {
    address: '<?php echo get_field('group_location')['address']; ?>',
    coordinates: [<?php echo get_field('group_location')['coordinates']; ?>]
  }; 
  
</script>

<div class="panel panel-default location">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo get_field('group_location')['address']?></h3>
  </div>
  <div class="panel-body">
    <div class="map" id="map"></div>
  </div>
</div>

<?php endif; ?>