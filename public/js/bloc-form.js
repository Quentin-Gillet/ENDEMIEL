var allFiles = [];



var googleMapScript = document.createElement('script');
googleMapScript.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCLOBBi470XIAX1gnetthnSwET6XtorLEM&callback=initMap&language=fr';
googleMapScript.defer = true;

/*document.head.appendChild(googleMapScript);

window.initMap = function() {
    let map, infoWindow, spotMarker = new google.maps.Marker;

    let markerLat = document.querySelector('#marker_lat_input');
    let markerLng = document.querySelector('#marker_lng_input');

    var latLng;

    if(markerLat.value && markerLng.value){
        latLng = {lat: parseFloat(markerLat.value), lng: parseFloat(markerLng.value)};
    }else{
        latLng = {lat: 48.866667, lng: 2.333333};
    }

    var options = {
        zoom: 8,
        center: latLng,
        zoomControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        scaleControl: false,
        streetViewControl: false, //A voir TODO
        rotateControl: false,
        fullscreenControl: true,
        gestureHandling: 'greedy',
        minZoom: 6,
    };

    map = new google.maps.Map(document.getElementById('container_map'), options);
    spotMarker.setMap(map);

    if (markerLat.value && markerLng.value){
        spotMarker = new google.maps.Marker({
            position: latLng,
            map: map,
        });
    }

    map.addListener('click', (e) => {
        spotMarker.setPosition(e.latLng);
        markerLat.value = e.latLng.lat();
        markerLng.value = e.latLng.lng();
    });

    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Aller a votre position";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    spotMarker = new google.maps.Marker({
                        position: pos,
                        map: map,
                    });
                    infoWindow.setContent("Vous voila.");
                    infoWindow.open(map, spotMarker);
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
}*/

document.querySelector('#bloc-form').addEventListener('submit', function (e) {
    e.preventDefault();
    /*if (checkInputEmpty()){
        return;
    }
    current_uploader.start();*/
});

function force_submit() {
    document.querySelector('#bloc-form').submit();
}

/*
var current_uploader = new plupload.Uploader({
    "runtimes": "html5",
    "browse_button": "browse-button",
    "url": "/bloc-spot/upload",
    "headers": {
        "Accept": "application/json",
        "X-CSRF-TOKEN" : document.querySelector('meta[name="csrf-token"]').content
    },
    "chunk_size": "5mo",
    "unique_names": true,
    init: {
        FilesAdded: function (up, files){
            allFiles.push(files);
            document.querySelector(".label_title").innerHTML = files.length + " fichier(s) choisi";
        },
        UploadProgress: function(up, file) {
            document.querySelector("label[for='progress']").innerHTML = file.percent + '%';
            document.getElementById('progress').value = file.percent;
        },
        UploadComplete: function(up, files){
            files.forEach(file => {
                document.getElementById('hidden_input').innerHTML += `<input type="hidden" name="file_upload_id" value="${file.id}">`;
            });
            document.querySelector('#bloc-form').submit();
        },
        Error: function(up, err) {
            console.log(err);
        }
    }
});
*/
current_uploader.init();

function checkInputEmpty() {
    var input_name_value = document.querySelector('.input_name').value;
    var input_desc_value = document.querySelector('.input_description').value;

    let markerLat = document.querySelector('#marker_lat_input').value;
    let markerLng = document.querySelector('#marker_lng_input').value;

    let waysNumber = document.querySelector('#ways_number').value

    var input_name_error = document.querySelector('#input_name_error');
    var input_desc_error = document.querySelector('#input_desc_error');
    var input_file_error = document.querySelector('#input_file_error');
    var input_ways_error = document.querySelector('#input_ways_error');
    var input_map_error = document.querySelector('#input_map_error');

    input_name_error.innerHTML = '';
    input_desc_error.innerHTML = '';
    input_file_error.innerHTML = '';
    input_ways_error.innerHTML = '';
    input_map_error.innerHTML = '';

    if(input_name_value == null || input_name_value === ''){
        input_name_error.innerHTML = 'Requis';
        return true;
    }
    if(input_desc_value == null || input_desc_value === ''){
        input_desc_error.innerHTML = 'Requis';
        return true;
    }
    if (allFiles.length === 0){
        input_file_error.innerHTML = 'Requis';
        return true;
    }
    if (!markerLat && !markerLng){
        input_map_error.innerHTML = 'Requis';
        return true;
    }
    if(waysNumber == null ){
        input_ways_error.innerHTML = 'Requis, doit être un nombre valide';
        return true;
    }
    return false;
}
