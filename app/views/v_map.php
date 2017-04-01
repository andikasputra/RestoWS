<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFiBre6o14mNVJOGhNUAoSkh5aHX71y0Q">
    </script>
    <script type="text/javascript">
      function initialize() {
        var myLatlng = new google.maps.LatLng(-7.753882,110.344922);
        var mapOptions = {
          center: myLatlng,
          zoom: 14
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });
        marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>

  <body>
    <div id="map-canvas"></div>
  </body>

</html>