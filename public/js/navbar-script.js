window.addEventListener('scroll',()=>{
    if (window.scrollY > 500){
        document.querySelector(".navbar").style.backgroundColor = 'rgba(0,0,0,0.8)';
    } else {
        document.querySelector(".navbar").style.backgroundColor = 'rgba(0,0,0,0)';
    }
})
