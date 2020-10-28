function open_submenu() {
    document.querySelector(".search").style.top="-100em"
    document.querySelector(".container").style.top="-100em"
    document.querySelector(".submenu").style.height="100%"
    window.addEventListener('scroll',noScroll)

}
function close_submenu(){
    document.querySelector(".search").style.top="0"
    document.querySelector(".container").style.top="0"
    document.querySelector(".submenu").style.height="0%"
    window.removeEventListener('scroll',noScroll);
}

function noScroll() {
    window.scrollTo(0,0);
}

