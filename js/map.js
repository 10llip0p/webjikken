var map;
var geocoder;
var marker;
var jsonBody;
var tmp;
function initMap() {
    //AjaxでJSONを取得
    $.ajax({
        type: "POST",
        url: "../event.php",
        dataType: "json",
    }).done(function (result) {
        jsonBody = result;
        console.log(jsonBody);

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

       // for(var i in jsonBody.rest) {
        var n = 0;
        var geofun = function () {
            console.log(n);
       //     codeToAddress(jsonBody.rest[n].address);
            n++;
            var id = setTimeout(geofun, 500);
            if(n >= jsonBody.rest.length) {
                clearTimeout(id);
            }
        }
        geofun();
        console.log(jsonBody.rest.length);
       // }
     /*   //マーカーの設置
        for(var i in jsonBody.rest) {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'address': String(jsonBody.rest[i].address);
            }, function(results, status) { // 結果
                if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                    marker[i] = new google.maps.Marker({
                        position:
                            results[0].geometry.location,
                        map: map
                    });
                    console.log("hoge");
                } else { // 失敗した場合
                    marker[i] = new google.maps.Marker({
                        position: {
                            lat: Number(jsonBody.rest[i].latitude),
                            lng: Number(jsonBody.rest[i].longitude)
                        },
                        map: map
                    });
                    console.log("fuga");
                }
            });
        } */
    });
}

//geocoder
function codeToAddress(geoAddress) {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': geoAddress
    }, function(results, status) { // 結果
        if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
            console.log(status);
            marker = new google.maps.Marker({
                        position:
                            results[0].geometry.location,
                        map: map
                    });
        } else { // 失敗した場合
            console.log(status);
        }
    });
}