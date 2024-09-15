let banners = ["img/banner3.jpg","img/banner4.jpg","img/banner1.jpg"];
let bannerAtual = 0;

function trocaBanner() {
    bannerAtual = (bannerAtual + 1) % 3;
    document.querySelector('#secao-banner img').src = banners[bannerAtual];
}
setInterval(trocaBanner, 3000);