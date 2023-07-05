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
                    <li><a href="../Estoque/estoque.php" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a>
                    </li>
                    <li><a href="../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a>
                    </li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

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
        <div id="myCarousel" class="carousel slide mb-6 mt-10 position-relative" data-bs-ride="carousel"
            data-bs-theme="light">
            <div class="carousel-inner position-relative" style="height: 500px;">
                <div class="carousel-item position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/fotoSlider/teste/foto0.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start mb-3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/fotoSlider/teste/foto2.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption mb-3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item active position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/fotoSlider/teste/foto4.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-end mb-3">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <form class="searchForm input-group col-12 w-50 mb-3 position-absolute start-50 translate-middle" role="search"
            autocomplete="off">
            <span class="lupaSearch fa-solid fa-magnifying-glass"></span>
            <input type="search" class="inputSearch" placeholder="Pesquisar carro..." aria-label="Search"
                id="searchInput">
            <ul class="resultSearch inHome"></ul>
        </form>

        <div class="homeContente">
            <div class="homeText">
                <h1 class="homeTitle">Nossa empresa traz exclusividade e luxo aos nossos clientes</h1>
                <p class="subtitle">Todos os carros são verificados e autenticados pelas marcas originais.</p>
                <div class="row imgDestaquesContent">
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/Porsche-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/Ferrari-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/logo-bmw.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/logo-lambo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/Mercedes-Logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="lg imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/Audi_logo.png" alt=""></div>
                    <div class="imgDestaqueDIv d-flex col-3 position-relative"><img class="imgDestaque"
                            src="../Imagens/Icones-Logos/logoMarcas/tesla-logo.png" alt=""></div>
                </div>

                <div class="homeDestaques">
                    <h1>Veiculos em Destaque</h1>
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