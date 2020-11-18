var i = 0;
var background = [
    "url('{{ asset('images/back.jpg') }}')",
    "url('{{ asset('images/back2.jpg') }}')",
    "url('{{ asset('images/back3.jpg') }}')"

];
var time = 6000;

function changeBackground() {
    document.querySelector("body").style.backgroundImage = background[i];
    if (i < background.length - 1) {
        i++;
    } else {
        i = 0;
    }
    setTimeout("changeBackground()", time);
}

window.onload = changeBackground;
