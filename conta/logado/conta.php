<?php
session_start();

if ((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)) {
    header('Location: ../login/login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}
$logado = $_SESSION['email'];

$navOptions = '<li><a class="dropdown-item" href="login.php">Fazer Login</a></li>';

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item" href="#">Configuracoes</a></li>
    <li><a class="dropdown-item" href="#">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="../login/sair.php">Sair</a></li>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziem Motors</title>
    <link rel="shortcut icon" href="../../Imagens/icones-Logos/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="conta.css">
    <link rel="stylesheet" href="../../geral.css?v=1">

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
                <a href="../../home/home.php"
                    class="logoimg d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none position-relative"
                    style="width: 42px; height:40px">
                    <img class="bi me-2 logoimg" src="../../Imagens/icones-Logos/logoNOVOZIEMBLACK.png" alt="logoZiem">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../../Estoque/estoque.php"
                            class="nav-link px-3 link-body-emphasis navTitle">Estoque</a></li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="focus-ring form-control" placeholder="Pesquisar carro..."
                        aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../Imagens/icones-Logos/usericon.svg" alt="mdo" width="38" height="38"
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
        <aside class="asideNav">
            <ul class="asideUl noSelect">
                <p class="asideTitle">Conta</p>
                <a href="#">
                    <li>Dados</li>
                </a>
                <a href="#">
                    <li>Segurança</li>
                </a>
                <a href="#">
                    <li>Privacidade</li>
                </a>
            </ul>
            <ul class="asideUl noSelect">
                <p class="asideTitle">Configuracoes</p>
                <a href="#">
                    <li>Preferencias</li>
                </a>
                <a href="#">
                    <li>Atendimento</li>
                </a>
                <a href="#">
                    <li>Ajuda</li>
                </a>
                <a href="#">
                    <li>Sair</li>
                </a>
            </ul>
        </aside>


        <div class="content">
            <div class="conta">
                <section class="showConta">
                    <h1>Conta</h1>
                    <p>Conectado como
                        <?php echo $logado ?>
                    </p>
                </section>
                <section class="configConta">
                    <h1>Suas informacoes</h1>
                    <p>Verifique se suas informacoes estao corretas</p>
                    <div class="userInfos">
                        <div class="fotoUser">
                            <img src="/Imagens/FotoCarros/fotoSlider/foto1.jpg" alt="">
                            <div>
                                <p class="fotoTitle">Foto de perfil</p>
                                <p class="fotoSubtitle">trocar foto de perfil</p>
                                <p class="fotoSubtitle">remover foto de perfil</p>
                            </div>
                        </div>
                        <div class="textUser">
                            <p>Dados pessoais</p>
                            <div class="nameUser">
                                <p>nome</p>
                                <input type="text">
                            </div>
                            <div class="emailUser">
                                <p>email</p>
                                <input type="email">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </main>
    <footer class="footer">
        <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
    </footer>
</body>

<script src="conta.js?v=1" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>