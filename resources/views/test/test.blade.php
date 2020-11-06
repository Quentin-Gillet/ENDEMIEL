<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jildertmiedema/laravel-plupload/js/plupload.full.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
<div id="test">
    <div id="current-container">
        <input id="current-browse-button" placeholder="Select me" type="file">
        <button id="current-start-upload">Send</button>
    </div>
    <progress id="progress" value="0" max="100"></progress>
</div>

<script>
    var current_uploader = new plupload.Uploader({
        "runtimes": "html5",
        "browse_button": "current-browse-button",
        "container": "current-container",
        "url": "{{ route('test.post') }}",
        "headers": {
            "Accept": "application/json",
            "X-CSRF-TOKEN" : document.querySelector('meta[name="csrf-token"]').content
        },
        "chunk_size": "5mo",
        "unique_names": true,
        init: {
            FilesAdded: function (up, file){
              console.log(file);
            },
            UploadProgress: function(up, file) {
                document.getElementById('progress').value = file.percent;
            },
            FileUploaded: function (up, file, result){
                let filePath = JSON.parse(result.response).result;
            },
            Error: function(up, err) {
                console.log(err);
            }
        }
    });
    current_uploader.init();
    document.getElementById('current-start-upload').onclick = function() {
        current_uploader.start();
    };
</script>
</body>
</html>
