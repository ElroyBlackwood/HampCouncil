<?php 
function outputLocationMap() { ?>
<script type="text/javascript">
	function initMap() {
	  var location = {lat: 51.095544, lng: -1.312400};
	  var map = new google.maps.Map(
	      document.getElementById('gmap'), {zoom: 9, center: location});
	  // var marker = new google.maps.Marker({position: location, map: map});
	}
</script>
<div class="container-fluid" id="google-maps">
	<!-- <div id="gmap">
	</div> -->
	<a href="https://goo.gl/maps/HNtZBtwERdj4Vkdp6" target="_blank">
		<div class="static-map" style="background-image: url(<?php echo bloginfo('url'); ?>/wp-content/uploads/2019/08/HAM-static-map-1209x1080.png);">
		</div>
	</a>
	<a href="https://goo.gl/maps/HNtZBtwERdj4Vkdp6" target="_blank">
		<div class="read-more">
			<div class="blue-arrow"></div>
			<span>Open this map in Google maps</span>
		</div>
	</a>

</div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQjBmlxzTSON7OQoMyET2J34kTAS9sWd0&callback=initMap">
    </script>
<?php 
}

?>