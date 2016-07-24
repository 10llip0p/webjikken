var map;
function initMap() {
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

    var styleOptions = [
        {
            featureType: 'all',
            elementType: 'labels',
            stylers: [{visibility: 'off'}]
        }
    ];
    var styledMap = new google.maps.StyledMapType(styleOptions, {name: "StyledMap"});
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
}