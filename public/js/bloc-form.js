function popup_quit() {
    document.querySelector('.popup').style.display = 'none';
    document.body.style.overflow="initial";

}
function check_file() {
    window.addEventListener("change", check);
}
function check() {
    if (document.querySelector(".label").value =! null) {
        document.querySelector(".label_title").innerHTML = "1 fichier choisi";
    }
}
