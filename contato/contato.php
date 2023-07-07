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
    <link rel="stylesheet" href="contato.css?v=1.45">

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
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                    <li><a href="../Sobrenos/sobrenos.php" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
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
    <main>
        <div class="pag">
            <div class="contato">
                <br><br><br>
                <p>&nbsp;&nbsp; Entre em contato pelo nosso formulário</p>

            </div>
            <div class="contatoInput">
                <p class="nome">Nome</p>
                <input type="text" name="nameUser" id="" placeholder="Nome"><br><br>
                <p class="email">Email</p>
                <input type="text" name="emailUser" id="" placeholder="Email"><br><br>
                <p class="telefone">Telefone</p>
                <input type="text" name="telefoneUser" id="" placeholder="telefone"><br><br>
                <p class="mensagem">Mensagem</p>
                <textarea name="msgUser" id="" cols="30" rows="10" placeholder="Mensagem"></textarea><br><br>
                <button>ENVIAR</button>
            </div>
            <div class="pagesqueda"></div>
            <div class="pagdireita">
                <h1 class="contatenos">Contate nos</h1>
                <div class="informações">
                    <p><img src="../Imagens/icones-Logos/icone-telefone-2.png" alt="img1" class="img1">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (47)3444-5991

                    </p>
                    <p><img src="../Imagens/icones-Logos/icone localização.png" alt="img2" class="img2">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Doutor João Colin, 120 - Centro Joinville/SC</p>
                    <p><img src="../Imagens/icones-Logos/icone horario.png" alt="img3" class="img3">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Horário de funcionamento: Terça e quinta, das 9:00 às 18:00</p>
                    <p><img src="../Imagens/icones-Logos/icone email.png" alt="img4" class="img4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ziemmotors@contato.br</p>

                </div>

            </div>
        </div>
    </main>
</body>

<script src="contato.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</html>