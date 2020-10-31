let markers = [];
let markerClusterer = null;
let map = null;

async function initMap(){

    let infoWindow = new google.maps.InfoWindow;
    let addSiteInfoWindow = new google.maps.InfoWindow;
    let addSiteMarker = new google.maps.Marker;

    var options = {
        zoom: 8,
        center: {lat: 48.866667, lng: 2.333333},
        zoomControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        scaleControl: false,
        streetViewControl: false, //A voir #TODO
        rotateControl: false,
        fullscreenControl: true,
        gestureHandling: 'greedy',
        minZoom: 6,
    };

    map = new google.maps.Map(document.getElementById('container_map'), options);

    var data = null
    await axios.get('/marker/all')
        .then(response => data = response.data)
        .catch(error => console.log(error));

    data.forEach(function (element){
        var location = {lat: element.latitude, lng: element.longitude}
        var marker = new google.maps.Marker({
            position: location,
            label: (element.id).toString(),
            title: element.name,
            map: map,
        });
        marker.addListener("click", async () => {
            await axios.get('/marker/info-window/' + element.id)
                .then(response => data = response.data)
                .catch(error => console.log(error));

            infoWindow.setContent(data);
            infoWindow.open(map, marker);
        });
        markers.push(marker);
    });

    map.addListener("click", (e) => {
        var lat = e.latLng.lat();
        var lng = e.latLng.lng();

        var data = '<a href="/bloc-site/create/' + lat +'/' + lng +'"><button>Créer un site</button></a>'

        addSiteMarker.setPosition(e.latLng);
        addSiteMarker.setTitle(e.latLng);
        addSiteMarker.setMap(map);

        addSiteInfoWindow.setContent(data);

        google.maps.event.addListener(addSiteInfoWindow, 'closeclick', function() {
            addSiteMarker.setVisible(false);
        });
        addSiteInfoWindow.open(map, addSiteMarker)

    });

    markerClusterer = new MarkerClusterer(map, markers, {
        imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}
