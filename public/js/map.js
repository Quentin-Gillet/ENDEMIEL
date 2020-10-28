let markers = [];
let markerClusterer = null;
let map = null;

async function initMap(){
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
        fullscreenControl: true

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
            map: map,
        });
        markers.push(marker);
    });

    map.addListener("click", (e) => {
        console.log(e);
        document.querySelector('.popup').style.display = 'block';
        window.scroll(0,600)
        document.body.style.overflow="hidden";
        document.getElementById('marker_lat_input').value = e.latLng.lat();
        document.getElementById('marker_lng_input').value = e.latLng.lng();
    });

    markerClusterer = new MarkerClusterer(map, markers, {
        imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
    });

    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Aller a votre position";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    /*infoWindow.setPosition(pos);
                    infoWindow.setContent("Vous êtes ici");
                    infoWindow.open(map);*/
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
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

function popup_quit() {
    document.querySelector('.popup').style.display = 'none';
    document.body.style.overflow="initial";

}


