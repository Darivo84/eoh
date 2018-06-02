/*
 *  @title: Creative Spark API free Maps
 *  @description: Simple way of creating Google Maps with the option of no API key, made for EOH through Creative Spark CPT.
 *  @author: Taan Basson
 *  @date: 3 February 2018
 *
*/

/* map */
var locations = [
    ['EOH Johannesburg', -26.1735522, 28.1267783, 3],
    ['EOH Cape Town', -33.8829859, 18.5199455, 2],
    ['EOH Durban', -29.7362803, 31.0630183, 1]
  ];

  var map = new google.maps.Map(document.getElementById('eohmap'), {
    zoom: 5,
    center: new google.maps.LatLng(-29.8987305, 30.1087029),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: true
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) { 
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: "../images/pin.svg"
    });

    google.maps.event.addListener(marker, 'click', ( function (marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));

  }