<?php
session_start();
$navOptions = '<li><a class="dropdown-item" href="../conta/login/login.php">Fazer Login</a></li>';

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item" href="../conta/logado/conta.php">Configuracoes</a></li>
    <li><a class="dropdown-item" href="../conta/logado/conta.php">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="../conta/login/sair.php">Sair</a></li>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziem Motors</title>
    <link rel="shortcut icon" href="../Imagens/icones-Logos/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="../geral.css?v=1.45">
    <link rel="stylesheet" href="home.css">

    <!-- CDNS ---- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="navHeader position-fixed w-100 top-0">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start position-relative"
                style="height:60px">
                <a href="#"
                    class="logoimg d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none position-relative"
                    style="width: 42px; height:40px">
                    <img class="bi me-2 logoimg" src="../Imagens/icones-Logos/logoNOVOZIEMBLACK.png" alt="logoZiem">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../Estoque/estoque.php" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a></li>
                    <li><a href="../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="focus-ring form-control" placeholder="Pesquisar carro..."
                        aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../Imagens/icones-Logos/userIcon.svg" alt="userImg" width="38" height="38"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <?php echo $navOptions ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="slide" id="slide1" checked>
                <input type="radio" name="slide" id="slide2">
                <input type="radio" name="slide" id="slide3">
                <input type="radio" name="slide" id="slide4">
                <input type="radio" name="slide" id="slide5">

                <div class="slideImg first">
                    <img class="imageSlider id0" src="../Imagens/FotoCarros/fotoSlider/teste/foto0.jpg" alt="image0">
                </div>
                <div class="slideImg">
                    <img class="imageSlider id1 natela" src="../Imagens/FotoCarros/fotoSlider/teste/foto1.jpg"
                        alt="image1">
                </div>
                <div class="slideImg">
                    <img class="imageSlider id2" src="../Imagens/FotoCarros/fotoSlider/teste/foto2.jpg" alt="image2">
                </div>
                <div class="slideImg">
                    <img class="imageSlider id3" src="../Imagens/FotoCarros/fotoSlider/teste/foto3.jpg" alt="image3">
                </div>
                <div class="slideImg">
                    <img class="imageSlider id4" src="../Imagens/FotoCarros/fotoSlider/teste/foto4.jpg" alt="image4">
                </div>
                <div class="slideImg">
                    <img class="imageSlider id5" src="../Imagens/FotoCarros/fotoSlider/teste/foto5.jpg" alt="image5">
                </div>

                <div class="autoNavigation">
                    <div class="autoBtn1"></div>
                    <div class="autoBtn2"></div>
                    <div class="autoBtn3"></div>
                    <div class="autoBtn4"></div>
                    <div class="autoBtn5"></div>
                </div>

                <div class="manualNavigation">
                    <label for="slide1" class="manualBtn"></label>
                    <label for="slide2" class="manualBtn"></label>
                    <label for="slide3" class="manualBtn"></label>
                    <label for="slide4" class="manualBtn"></label>
                    <label for="slide5" class="manualBtn"></label>
                </div>
            </div>
        </div>

        <!-- <div class="regua">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div> -->
        <div class="homeContente">
            <div class="homeText">
                <h1 class="homeTitle">Nossa empresa traz exclusividade e luxo aos nossos clientes</h1>
                <p class="subtitle">Todos os carros são verificados e autenticados pelas marcas originais.</p>
                <div class="row imgDestaquesContent">
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/Audi_logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/Ferrari-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/logo-bmw.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/logo-lambo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/Mercedes-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/Porsche-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque" src="../Imagens/Icones-Logos/logoMarcas/tesla-logo.png" alt=""></div>
                </div>

                <div class="homeDestaques">
                    <h1>Destaques</h1>
                    <div class="destaquesCard">
                        <div class="card">
                            <img src="" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
    </footer>
</body>

<script src="home.js?v=1.45" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>