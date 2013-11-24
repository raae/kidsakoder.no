function initializeMap($mapEl, centerCoordinates, zoomLevel) {
	map = new google.maps.Map($mapEl[0], { 
		zoom: zoomLevel, 
		center: new google.maps.LatLng(centerCoordinates[0], centerCoordinates[1]), 
		mapTypeId: google.maps.MapTypeId.ROADMAP ,
		scrollwheel: false
	});
	
	return map;
}

function addMarker(map, pinCoordinates) {
  return new google.maps.Marker({
    	position: new google.maps.LatLng(pinCoordinates[0], pinCoordinates[1]),
      map: map
	});
}

function addMarkers(map, locations, infowindow) {
  $.each( locations, function( index, location ){

    var marker = addMarker(map, location.coordinates);
    google.maps.event.addListener(marker, 'click', function(event) {
      infowindow.setContent(location.info);
      infowindow.open(map, marker);
    });

  });
}

$(function() {

if(window['google']) {

  if(window['groupLocation']) {
    var map = initializeMap($('.single-lkk_group .map'), groupLocation.coordinates, 12);
    addMarker(map, groupLocation.coordinates);
  }
  
  var infowindow = new google.maps.InfoWindow();
  
  if(window['groupLocations']) {
    var map = initializeMap($('.groups.map'), [61.0000, 8.0000], 6);
    addMarkers(map, groupLocations, infowindow);
  }
  
} else {
  console.log("Google script has not been loaded");
}
  
});