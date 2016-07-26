var map;
var marker = [];
var jsonBody;
function initMap() {
   //mapの描画
   map = new google.maps.Map(document.getElementById('map-canvas'), {
       center: {
           lat: 36.090410,
           lng: 140.107721
       },
       zoom: 14,
       disableDefaultUI: true,
       mapTypeControlOptions: {
           mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
       }
   });

   //mapでデザインの変更
   var styleOptions =
       [
           {
               "featureType": "all",
               "elementType": "labels.text.fill",
               "stylers": [
                   {
                       "color": "#232323"
                   }
               ]
           },
           {
               "featureType": "all",
               "elementType": "labels.text.stroke",
               "stylers": [
                   {
                       "color": "#ffffff"
                   }
               ]
           },
           {
               "featureType": "poi",
               "elementType": "geometry.fill",
               "stylers": [
                   {
                       "lightness": "-15"
                   }
               ]
           },
           {
               "featureType": "road.highway",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#000000"
                   },
                   {
                       "lightness": "80"
                   }
               ]
           },
           {
               "featureType": "road.highway",
               "elementType": "labels.text.fill",
               "stylers": [
                   {
                       "color": "#494949"
                   }
               ]
           },
           {
               "featureType": "road.highway",
               "elementType": "labels.text.stroke",
               "stylers": [
                   {
                       "color": "#ffffff"
                   }
               ]
           },
           {
               "featureType": "road.arterial",
               "elementType": "geometry",
               "stylers": [
                   {
                       "color": "#ff6557"
                   }
               ]
           },
           {
               "featureType": "road.local",
               "elementType": "geometry",
               "stylers": [
                   {
                       "saturation": "0"
                   },
                   {
                       "lightness": "-10"
                   }
               ]
           },
           {
               "featureType": "road.local",
               "elementType": "labels.text.fill",
               "stylers": [
                   {
                       "lightness": "30"
                   },
                   {
                       "saturation": "0"
                   }
               ]
           },
           {
               "featureType": "transit",
               "elementType": "all",
               "stylers": [
                   {
                       "color": "#00b2b0"
                   }
               ]
           },
           {
               "featureType": "transit",
               "elementType": "labels.text.fill",
               "stylers": [
                   {
                       "color": "#ffffff"
                   }
               ]
           }
       ];
   var styledMap = new google.maps.StyledMapType(styleOptions, {name: "StyledMap"});
   map.mapTypes.set('map_style', styledMap);
   map.setMapTypeId('map_style');

    $.ajax({
           type: "POST",
           url: "../geocode.php",
           dataType: "json",
       }).done(function (result) {
        jsonBody = result;
        console.log(jsonBody);

        //マーカーの設置
        for (var i in jsonBody.rest) {
            console.log(i);
            marker[i] = new google.maps.Marker({
                position: {
                    lat: jsonBody.rest[i].latitude,
                    lng: jsonBody.rest[i].longitude
                },
                map: map
            });
          // console.log(marker[i]);
        }
   });
}
