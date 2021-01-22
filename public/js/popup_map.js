window.addEventListener('load', ()=>{

    for (let k = 1; k < 5; k++){
        document.querySelector('.label' + k).style.transition = '0.4s';
        setTimeout(function () {
            document.querySelector('.label' + k).style.opacity = '1';
        },150 * k);
    }
});

window.addEventListener('scroll',()=>{
    if (window.scrollY > 800){
        for (let k = 5; k < 7; k++){
            document.querySelector('.label' + k).style.transition = '0.4s';
            setTimeout(function () {
                document.querySelector('.label' + k).style.opacity = '1';
            },100 * k);
        }
    }
    if (window.scrollY > 1000){
        for (let k = 7; k < 9; k++){
            document.querySelector('.label' + k).style.transition = '0.4s';
            setTimeout(function () {
                document.querySelector('.label' + k).style.opacity = '1';
            },100 * k);
        }
    }
    if (window.scrollY > 1300){
        for (let k = 9; k < 21; k++){
            document.querySelector('.label' + k).style.transition = '0.4s';
            setTimeout(function () {
                document.querySelector('.label' + k).style.opacity = '1';
            },50 * k);
        }
    }
    if (window.scrollY > 1600){
        for (let k = 21; k < 23; k++){
            document.querySelector('.label' + k).style.transition = '0.4s';
            setTimeout(function () {
                document.querySelector('.label' + k).style.opacity = '1';
            },50 * k);
        }
    }
});

