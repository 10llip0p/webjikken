var map;
var jsonBody;
function initMap() {
    //ajax
    $.ajax({
        type: "POST",
        url: "../event.php",
        dataType: "json",
    }).done(function (result) {
        console.log(result);
        //console.log(result.rest[1].name);
        jsonBody = result;
    });

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