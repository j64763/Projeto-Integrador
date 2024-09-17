<!DOCTYPE html>
	<html lang="pt-br">
		<head>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
			<title>Mania de Cupcake</title>
			<link rel="icon" type="image/x-icon" href="icons/favicon.ico">
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/reset.css">
			<link rel="stylesheet" href="css/menu.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
      <script src="jquery.js"></script>
    </head>

		<body>
          <?php include("cabeçalho.php"); ?>
  
            <section id="secao-banner">
            <a href="#"><img src="img/banner4.jpg" class="container" id="banner"></a>
            <button id="mudar-banner" onclick="mudar()"><i class="material-icons">chevron_right</i></button>
            </section>

            <div class="container paineis">
              <section class="painel categorias">
                <h2>Categorias</h2>
                <ol>
                  <li>
                    <a href="categorias.php?id=1" alt="categoria2">
                      <figure>
                        <figcaption>massa branca</figcaption>
                        <img src="img/massa-branca-painel1.png" alt="imagem-cupcake-massa-branca">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=2" alt="categoria2">
                      <figure>
                        <figcaption>chocolate</figcaption>
                        <img src="img/chocolate-painel1.png" alt="imagem-cupcake-chocolate">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=3" alt="categoria1">
                      <figure>
                        <figcaption>Datas comemorativas</figcaption>
                        <img src="img/datas-comemorativas-painel1.png" alt="imagem-datas-comemorativas">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=4" alt="categoria2">
                      <figure>
                        <figcaption>zero açúcar</figcaption>
                        <img src="img/zero-painel1.jpg" alt="imagem-cupcake-zero">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=5" alt="categoria2">
                      <figure>
                        <figcaption>salgados</figcaption>
                        <img src="img/salgado-painel1.jpg" alt="imagem-cupcake-salgado">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=6" alt="categoria2">
                      <figure>
                        <figcaption>doces típicos</figcaption>
                        <img src="img/doce-tipico-painel1.png" alt="imagem-cupcake-doce-tipico">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=7" alt="categoria2">
                      <figure>
                        <figcaption>simples</figcaption>
                        <img src="img/massa-simples-painel1.jpg" alt="imagem-cupcake-massa-simples">
                      </figure>
                    </a>
                  </li>
                </ol>
                <button id="mostrar-mais">Mostrar mais</button>
              </section>

              <section class="painel veja-tambem">
                <h2>Veja Também</h2>
                <ol>
                  <li>
                    <a href="categorias.php?" alt="categoria2">
                      <figure>
                        <figcaption>Últimos dias</figcaption>
                        <img src="img/ultimos-dias2-painel2.jpg" alt="imagem-cupcake-chocolate">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?" alt="categoria2">
                      <figure>
                        <figcaption>Mais comprados</figcaption>
                        <img src="img/mais-comprados-painel2.png" alt="imagem-mais-comprados">
                      </figure>
                    </a>
                  </li>
                  <li>
                    <a href="categorias.php?id=1" alt="categoria2">
                      <figure>
                        <figcaption>Kits</figcaption>
                        <img src="img/kit-painel2.jpg" alt="imagem-kits">
                      </figure>
                    </a>
                  </li>
                </ol>
               
              </section>

            </div>

            <?php include("rodape.php") ?>

            <!--Javascript-->
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/home.js"></script>
            <script language="javascript" src="js/banner.js"></script>
            <script language="javascript" src="js/mudar-banner.js"></script>
          </body>