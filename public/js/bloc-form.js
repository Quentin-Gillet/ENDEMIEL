var allFiles = [];



var googleMapScript = document.createElement('script');
googleMapScript.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCLOBBi470XIAX1gnetthnSwET6XtorLEM&callback=initMap&language=fr';
googleMapScript.defer = true;

document.head.appendChild(googleMapScript);

window.initMap = function() {
    let map, infoWindow, spotMarker = new google.maps.Marker;

    let markerLat = document.querySelector('#lat');
    let markerLng = document.querySelector('#lng');

    var latLng;

    if (markerLat.value && markerLng.value) {
        latLng = {lat: parseFloat(markerLat.value), lng: parseFloat(markerLng.value)};
    } else {
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
        gestureHandling: 'cooperative',
        minZoom: 6,
        restriction: {
            latLngBounds: {
                north: 53,
                south: 40,
                east: 10,
                west: -7,
            }
        }
    };

    map = new google.maps.Map(document.getElementById('gmap_canvas'), options);
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
}

document.querySelector('#bloc-form').addEventListener('submit', function (e) {
    e.preventDefault();
    image_uploader.start();
    file_uploader.start();
});

var completed_upload = 0;

var image_uploader = new plupload.Uploader({
    "runtimes": "html5",
    "browse_button": "image-upload",
    "url": "/bloc-spot/upload",
    "headers": {
        "Accept": "application/json",
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    "chunk_size": "3mo",
    "unique_names": true,
    filters: {
        mime_types: [
            {title: 'Image files', extensions: 'jpg,jpeg,png'}
        ],
        max_file_size: '10mo',
    },
    init: {
        FilesAdded: function (up, files) {
            allFiles.push(files);
            document.querySelector("#image-upload-text").innerHTML = files.length + " fichier(s) choisi";
        },
        BeforeUpload: function (up, files) {
            document.getElementById('image-upload-progress').style.display = "block";
        },
        UploadProgress: function (up, file) {
            document.querySelector("label[for='image-upload-progress']").innerHTML = file.percent + '% ' + 'complété(s)';
            document.getElementById('image-upload-progress').value = '0.8';
            setTimeout(()=>{
                document.getElementById('image-upload-progress').value = '1';
            },800);
        },
        UploadComplete: function (up, files) {
            files.forEach(file => {
                document.getElementById('hidden_input').innerHTML += `<input type="hidden" name="file-upload-id[]" value="${file.id}">`;
            });
            completed_upload += 1;
            if (completed_upload === 2) document.querySelector('#bloc-form').submit();
        },
        Error: function (up, err) {
            console.log(err);
        }
    }
});

var file_uploader = new plupload.Uploader({
    "runtimes": "html5",
    "browse_button": "file-upload",
    "url": "/bloc-spot/upload",
    "headers": {
        "Accept": "application/json",
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    "chunk_size": "3mo",
    "unique_names": true,
    filters: {
        mime_types: [
            {title: 'Image files', extensions: 'pdf'}
        ],
        max_file_size: '10mo',
    },
    init: {
        FilesAdded: function (up, files) {
            allFiles.push(files);
            document.querySelector("#file-upload-text").innerHTML = files.length + " fichier(s) choisi";
        },
        BeforeUpload: function (up, files) {
            document.getElementById('file-upload-progress').style.display = "block";
        },
        UploadProgress: function (up, file) {
            document.getElementById('file-upload-progress').style.display = "block";
            document.querySelector("label[for='file-upload-progress']").innerHTML = file.percent + '%';
            document.getElementById('file-upload-progress').value = file.percent;
        },
        UploadComplete: function (up, files) {
            files.forEach(file => {
                document.getElementById('hidden_input').innerHTML += `<input type="hidden" name="file-upload-id[]" value="${file.id}">`;
            });
            completed_upload += 1;
            if (completed_upload === 2) document.querySelector('#bloc-form').submit();
        },
        Error: function (up, err) {
            console.log(err);
        }
    }
});

image_uploader.init();
file_uploader.init();

function checkInputEmpty() {
    let markerLat = document.querySelector('#lat').value;
    let markerLng = document.querySelector('#lng').value;

    if (allFiles.length === 0) {
        console.log('missed files');
        return true;
    }
    if (!markerLat && !markerLng) {
        console.log('missed marker');
        return true;
    }
    return false;
}
