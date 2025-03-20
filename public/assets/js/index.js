const banner = document.getElementById("banner");
function carrossel(){
    let i = 1;
    banner.style.backgroundImage = `url('../assets/images/index/${i}.jpg')`
    setInterval(() => {
        i++
        if(i < 8){
            banner.style.backgroundImage = `url('../assets/images/index/${i}.jpg')`
        } else{
            i = 1
            banner.style.backgroundImage = `url('../assets/images/index/${i}.jpg')`
        }
    }, 3000);
}
carrossel()