window.addEventListener('scroll',()=>{
    if (window.scrollY > 500){
        document.querySelector(".navbar").style.backgroundColor = 'rgba(0,0,0,0.8)';
        document.querySelector(".container2").style.left = "0";
    } else {
        document.querySelector(".navbar").style.backgroundColor = 'rgba(0,0,0,0)';
    }
})
