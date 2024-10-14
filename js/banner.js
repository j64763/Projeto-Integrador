let banners = ["img/banner3.jpg","img/banner4.jpg","img/banner1.jpg"];
let bannerAtual = 0;

function trocaBanner() {
    bannerAtual = (bannerAtual + 1) % 3;
    document.querySelector('#secao-banner img').src = banners[bannerAtual];

    switch (banners[bannerAtual]) {
        case "img/banner4.jpg":
            document.querySelector('#secao-banner a').href = "categorias.php?id=8";
            break;
        case "img/banner3.jpg":
            document.querySelector('#secao-banner a').href = "categorias.php?id=2";
            break;
        case "img/banner1.jpg":
            document.querySelector('#secao-banner a').href = "categorias.php?id=9";
            break;
        }
  
}
setInterval(trocaBanner, 3000);