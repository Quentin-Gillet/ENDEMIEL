var allFiles = [];

function popup_quit() {
    document.querySelector('.popup').style.display = 'none';
    document.body.style.overflow="initial";
}

document.querySelector('#newBlockForm').addEventListener('submit', function(e){
    e.preventDefault();
});

var current_uploader = new plupload.Uploader({
    "runtimes": "html5",
    "browse_button": "browse-button",
    "url": "/bloc-site/files-upload",
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
            document.getElementById('progress').value = file.percent;
        },
        UploadComplete: function(up, files){
            files.forEach(file => {
                document.getElementById('hidden_input').innerHTML += `<input type="hidden" name="file_upload_id" value="${file.id}">`;
            });
            document.querySelector('#newBlockForm').submit();
        },
        Error: function(up, err) {
            console.log(err);
        }
    }
});
current_uploader.init();

function checkInputEmpty() {
    var input_name_value = document.querySelector('.input_name').value;
    var input_desc_value = document.querySelector('.input_description').value;

    var input_name_error = document.querySelector('#input_name_error');
    var input_desc_error = document.querySelector('#input_desc_error');
    var input_file_error = document.querySelector('#input_file_error');

    input_name_error.innerHTML = '';
    input_desc_error.innerHTML = '';
    input_file_error.innerHTML = '';

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
    return false;
}

document.getElementById('start-upload').onclick = function() {
    if (checkInputEmpty()){
        return;
    }
    current_uploader.start();
};
