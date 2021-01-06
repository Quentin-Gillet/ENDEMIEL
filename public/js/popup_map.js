const close_button = document.querySelector(".icon_close");
close_button.addEventListener('click',()=>{
    document.querySelector(".popup_map").style.height = '0px';
    document.querySelector(".popup_map").style.border = 'none';
    close_button.style.display = "none";

});

const open_popup = document.querySelector(".map_button");
open_popup.addEventListener('click',(e)=>{
    document.querySelector(".popup_map").style.height = "500px";
    setTimeout(function () {
        document.querySelector(".popup_map").style.border = '2px solid #F59121';
        close_button.style.display = "flex";
    },300);
    window.scrollTo(0,500);
});
