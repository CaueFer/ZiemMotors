<?php
session_start();
$navOptions = '<li><a class="dropdown-item" href="../conta/login/login.php">Fazer Login</a></li>';

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item" href="#">Configuracoes</a></li>
    <li><a class="dropdown-item" href="#">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    
    <li><a class="dropdown-item" href="../conta/login/sair.php">Sair</a></li>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziem Motors</title>
    <link rel="shortcut icon" href="../Imagens/icones-Logos/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="../geral.css?v=1.45">
    <link rel="stylesheet" href="sobrenos.css?v=1.45">

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
                <a href="../home/home.php"
                    class="logoimg d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none position-relative"
                    style="width: 42px; height:40px">
                    <img class="bi me-2 logoimg" src="../Imagens/icones-Logos/logoNOVOZIEMBLACK.png" alt="logoZiem">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../Estoque/estoque.php" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a>
                    </li>
                    <li><a href="../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 position-relative" role="search"
                    autocomplete="off">
                    <input type="search" class="focus-ring form-control" placeholder="Pesquisar carro..."
                        aria-label="Search" id="searchInput">
                    <ul class="resultSearch"></ul>
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
    <main class="sobrenos">
        <div class="">
            <p class="titulo">Sobre nós</p>
            <div class="row">
                <div class="col-4"></div>
            </div>
        
            </div>
            <div id="myCarousel" class="carousel slide mb-6 mt-10 position-relative" data-bs-ride="carousel"
            data-bs-theme="light">
            <div class="carousel-inner position-relative" style="height: 500px;">
                <div class="carousel-item position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/ferrari.png" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start mb-3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/lamborghini.png" alt="">
                    <div class="container">
                        <div class="carousel-caption mb-3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item active position-relative h-100">
                    <img class="w-100 h-100" style="object-fit: cover;"
                        src="../Imagens/FotoCarros/maclaren.png" alt="">
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
<p class="texto">Seja bem-vindo à Ziem MOTORS, empresa de vendas de carros de luxo e superesportivos, onde excelência em atendimento e qualidade dos nossos veículos são a nossa maior prioridade. Desde 1999 no mercado, a nossa empresa se destaca pela ampla variedade de carros de luxo e superesportivos disponíveis para venda, sempre com a mais alta qualidade e tecnologia do mercado. Com uma equipe de profissionais experientes e altamente capacitados, estamos sempre prontos paraatender nossos clientes de forma personalizada, garantindo a satisfação de cada um deles.
 Trabalhamos com as principais marcas de carros de luxo e superesportivos, como Lamborghini, Ferrari, Audi, Porsche, entre outras. Além disso, temos em nosso estoque uma grande variedade de modelos, desde os mais clássicos até os mais modernos e sofisticados.
 Aqui, o cliente encontra uma experiência única de compra, com um atendimento exclusivo que vai desde a escolha do veículo até a entrega do mesmo. Oferecemos ainda a possibilidade de personalização dos carros de acordo com as preferências dos nossos clientes.

Na nossa empresa, acreditamos que a compra de um carro de luxo é uma experiência única e memorável, e por isso buscamos oferecer sempre o melhor em qualidade, atendimento e preços justos. Venha nos visitar e conhecer o nosso showroom, onde você poderá encontrar o carro dos seus sonhos.</p>

        </div> 
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>