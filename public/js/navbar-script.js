function open_submenu() {
    document.querySelector(".search").style.bottom="-100em";
    document.querySelector(".container").style.bottom="-100em";
    document.querySelector(".submenu").style.height="100%";
    document.body.style.overflow="hidden";

}
function close_submenu(){
    document.querySelector(".search").style.bottom="0";
    document.querySelector(".container").style.bottom="0";
    document.querySelector(".submenu").style.height="0%"
    document.body.style.overflow="initial";
}
function icon_close() {
    document.querySelector(".border_message").style.display="none";
    document.body.style.overflow="initial";

}


