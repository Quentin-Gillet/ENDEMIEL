function open_submenu() {
    document.querySelector(".submenu").style.height="100%"
    document.querySelector(".search").style.opacity="0%"
    document.querySelector(".container").style.opacity="0%"
    window.addEventListener('scroll',noScroll)

}
function close_submenu(){
    document.querySelector(".submenu").style.height="0%"
    document.querySelector(".search").style.opacity="85%"
    document.querySelector(".container").style.opacity="100%"
    window.removeEventListener('scroll',noScroll)
}

function noScroll() {
    window.scrollTo(0,0);
}


