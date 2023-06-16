<?php

// ---------------------- CADASTRO ---------------------- //

if (isset($_POST['submitSign'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $nome = $_POST['nome'];

    $signClassAdd = "";
    $signError = "";
    $signInputInvalido = "0";

    if ($email && $password && $nome) {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        $validacao = $conexao->query($sql);

        if (mysqli_num_rows($validacao) > 0) {
            $signInputInvalido = 1;
        } else {
            $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha,nome) VALUES('$email','$password','$nome')");
            print_r("Conta criada");
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
    }
}
;

// ---------------------- LOGIN ---------------------- //

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
            header('Location: ../logado/conta.html');
        } else {
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
    <header>
        <nav>
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start position-relative" style="height:60px">
                    <a href="../../home/home.html" class="logoimg d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none position-relative" style="width: 42px; height:40px">
                        <img class="bi me-2 logoimg" src="../../Imagens/icones-Logos/logoNOVOZIEMBLACK.png" alt="logoZiem">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-3 link-secondary navTitle">Estoque</a></li>
                        <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                        <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="focus-ring form-control" placeholder="Pesquisar carro..." aria-label="Search">
                    </form>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="38" height="38"
                                class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="#">Configuracoes</a></li>
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container d-block position-relative vw-100 vh-100 p-10">
        <div class="row">

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
                                </div>
                                <button class="w-100 fancy mb-3" type="submit" name="submitSign">
                                    <span class="top-key"></span>
                                    <span class="text">CADASTRAR</span>
                                    <span class="bottom-key-1"></span>
                                    <span class="bottom-key-2"></span>
                                </button>
                                <small class="text-body-secondary subTitle">Clicando em Cadastrar, você concorda com os
                                    <a href="#">termos de
                                        usuario</a>.</small>
                                <hr class="my-4">
                                <h2 class="fs-5 fw-bold mb-3">Ou use um aplicativo parceiro</h2>
                                <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                                    <svg class="bi me-1" width="16" height="16">
                                        <use xlink:href="#twitter"></use>
                                    </svg>
                                    Cadastrar com Twitter
                                </button>
                                <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                                    <svg class="bi me-1" width="16" height="16">
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                    Cadastrar com Facebook
                                </button>
                                <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                                    <svg class="bi me-1" width="16" height="16">
                                        <use xlink:href="#github"></use>
                                    </svg>
                                    Cadastrar com Google
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

</body>

<script src="login.js?v=1.45"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>