<?php
session_start();
$navOptions = '<li><a class="dropdown-item text-dark" href="../conta/login/login.php">Fazer Login</a></li>';

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item text-black" href="../conta/logado/conta.php">Configuracoes</a></li>
    <li><a class="dropdown-item text-black" href="../conta/logado/conta.php">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item text-black" href="../conta/login/sair.php">Sair</a></li>';
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
    <header class="navHeader">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start position-relative text-white"
                style="height:60px">
                <a href="#"
                    class="logoimg d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none position-relative"
                    style="width: 42px; height:40px">
                    <img class="bi me-2 logoimg" src="../Imagens/icones-Logos/logoNOVOZIEMWHITE.png" alt="logoZiem" id="logoIcon">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../Estoque/estoque.php" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a>
                    </li>
                    <li><a href="../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a>
                    </li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

                <div class="dropdown text-end">
                    <a href="#" class="d-block linkNav text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false" id="userDropdown">
                        <img src="../Imagens/icones-Logos/userIconWhite.png" alt="userImg" width="38" height="38"
                            class="rounded-circle" id="iconUser">
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <?php echo $navOptions ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main style="margin-top: 0px!important;">
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
        </div>

        <div class="homeDestaques">
            <h1>Veiculos em Destaque</h1>
            <div class="row px-5 mx-auto mb-5">
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\lamboHarucan.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Lamborghini Huracan STO</h5>
                            <p class="card-text">2022</p>
                            <h5 class="card-subtitle">R$6.799.990,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\ferrariF8.jpeg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Ferrari F8 Spider</h5>
                            <p class="card-text">2023</p>
                            <h5 class="card-subtitle">R$5.599.000,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\audiRS.jpeg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Audi Rs Q8 TFSI</h5>
                            <p class="card-text">2021</p>
                            <h5 class="card-subtitle">R$1.389.900,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\BMWX4.jpeg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">BMW X4 M COMPETITION</h5>
                            <p class="card-text">2020</p>
                            <h5 class="card-subtitle">R$670.000,00</h5>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row px-5 mx-auto">
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\MECA.jpeg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Mercedes Benz G 63 AMG </h5>
                            <p class="card-text">2021</p>
                            <h5 class="card-subtitle">R$2.499.990,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\TESLA.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Tesla Model X Plaid</h5>
                            <p class="card-text">2023</p>
                            <h5 class="card-subtitle">R$1.699.900,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\ferrariROMA.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Ferrari Roma</h5>
                            <p class="card-text">2021</p>
                            <h5 class="card-subtitle">R$3.800.000,00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center cardDestaquesCar">
                    <div class="card cardDestaques">
                        <img src="..\Imagens\FotoCarros\destaqueBanner.png" class="cardImgDestaque" alt="...">
                        <img src="..\Imagens\FotoCarros\PORSCHE.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Porsche 911 Carrera GTS</h5>
                            <p class="card-text">2022</p>
                            <h5 class="card-subtitle">R$1.499.990,00</h5>
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