<?php

// ---------------------- CADASTRO ---------------------- //

if (isset($_POST['submitSign'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];

    $signClassAdd = "";
    $signError = "";
    $signValid = "";
    $signInputInvalido = "0";

    if ($email && $password && $nome) {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        $validacao = $conexao->query($sql);

        if (mysqli_num_rows($validacao) > 0) {
            $signInputInvalido = 1;
        } else {
            $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha,nome) VALUES('$email','$password','$nome')");
            $signInputInvalido = 3;
        }
    } else {
        $signInputInvalido = 2;
    }

    if ($signInputInvalido === 1) {
        $signClassAdd = "is-invalid";
        $signError = "Email ja cadastrado!";
    } else if ($signInputInvalido === 2) {
        $signClassAdd = "is-invalid";
        $signError = "Preencha os campos!";
    } else if ($signInputInvalido === 3) {
        $signClassAdd = "is-valid";
        $signValid = "Conta criada!";
    }
}
;

// ---------------------- LOGIN ---------------------- //
session_start();

if (isset($_POST['submitLogin'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $classAdd = "";
    $loginError = "";
    $inputInvalido = "0";

    if ($email && $password) {
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$password'";

        $validacao = $conexao->query($sql);

        if (mysqli_num_rows($validacao) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $password;
            header('Location: ../logado/conta.php');
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $inputInvalido = 1;
        }
    } else {
        $inputInvalido = 2;
    }

    if ($inputInvalido === 1) {
        $classAdd = "is-invalid";
        $loginError = "Email ou senha invalidos!";
    } else if ($inputInvalido === 2) {
        $classAdd = "is-invalid";
        $loginError = "Preencha os campos!";
    }
}
;

$navOptions = '<li><a class="dropdown-item" href="login.php">Fazer Login</a></li>';

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item" href="#">Configuracoes</a></li>
    <li><a class="dropdown-item" href="#">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="sair.php">Sair</a></li>';
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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../../geral.css?v=1.45">

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
                    <li><a href="../../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 position-relative" role="search" autocomplete="off">
                    <input type="search" class="focus-ring form-control" placeholder="Pesquisar carro..."
                        aria-label="Search" id="searchInput">
                    <ul class="resultSearch"></ul>
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

    <div class="container d-block position-relative vw-100 vh-100 p-10">
        <div class="row" style="margin-top: 50px!important;">
            <div class="col my-5">
                <div class="modal-dialog position-relative bg-opacity-100" role="document" style="top: 5%;">
                    <div class="modal-content">
                        <div class="modal-header p-5 pb-4 pt-0">
                            <h1 class="fw-normal mb-0 fs-2">Login</h1>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form class="" action="login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email"
                                        class="form-control rounded-0 btn-outline-danger <?php echo $classAdd; ?>"
                                        name="email" id="floatingInputLogin" placeholder="name@examplo.com">
                                    <label for="floatingInputLogin">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-0 <?php echo $classAdd; ?>"
                                        name="password" id="floatingPasswordLogin" placeholder="Senha">
                                    <label for="floatingPasswordLogin">Senha</label>
                                    <div class="invalid-feedback login">
                                        <?php echo $loginError; ?>
                                    </div>
                                </div>
                                <button class="w-100 fancy mb-3" type="submit" name="submitLogin" id="btnLogin">
                                    <span class="top-key"></span>
                                    <span class="text">LOGIN</span>
                                    <span class="bottom-key-1"></span>
                                    <span class="bottom-key-2"></span>
                                </button>
                                <small class="text-body-secondary subTitle">Não possui conta? Clique <a id="showSignBtn"
                                        onclick="showSignIn()">aqui</a> para
                                    criar uma.</small>
                            </form>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col my-5 border-start">
                <div class="modal-dialog position-relative bg-opacity-100" role="document" style="top: 5%;">
                    <div class="modal-content">
                        <div class="modal-header p-5 pb-4 pt-0">
                            <h1 class="fw-normal mb-0 fs-2">Nova conta</h1>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form class="" action="login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-0 <?php echo $signClassAdd; ?>"
                                        name="nome" id="floatingNome" placeholder="name@example.com">
                                    <label for="floatingInput">Nome</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-0 <?php echo $signClassAdd; ?>"
                                        name="email" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-0 <?php echo $signClassAdd; ?>"
                                        name="password" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Senha</label>
                                    <div class="invalid-feedback">
                                        <?php echo $signError; ?>
                                    </div>
                                    <div class="valid-feedback">
                                        <?php echo $signValid; ?>
                                    </div>
                                </div>
                                <button class="w-100 fancy mb-3" type="submit" name="submitSign">
                                    <span class="top-key"></span>
                                    <span class="text">CADASTRAR</span>
                                    <span class="bottom-key-1"></span>
                                    <span class="bottom-key-2"></span>
                                </button>
                                <small class="text-body-secondary subTitle">Clicando em Cadastrar, você concorda com os
                                    <a id="showSignBtn" href="#">termos de
                                        usuario</a>.</small>
                            </form>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
    </footer>
</body>

<script src="login.js?v=1.45"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>