<?php

// ---------------------- CADASTRO ---------------------- //

if (isset($_POST['submitSign'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $signClassAdd = "";
    $signError = "";
    $signInputInvalido = "0";

    if ($email && $password) {
        $sql = "SELECT * FROM usuarios WHERE  email = '$email'";

        $validacao = $conexao->query($sql);

        if (mysqli_num_rows($validacao) > 0) {
            $signInputInvalido = 1;
        } else {
            $result = mysqli_query($conexao, "INSERT INTO usuarios(email,senha) VALUES('$email','$password')");
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
            <div class="logo"><a href="../../home/home.html"><img src="../../Imagens/icones-Logos/logoZIEM.png"
                        alt="logoImg"></a></div>
            <div class="navMenu">
                <div class="hamburger">
                    <span class="hamburgerSlice"></span>
                    <span class="hamburgerSlice"></span>
                    <span class="hamburgerSlice"></span>
                </div>
                <ul class="navMenuLine">
                    <a href="../../Estoque/estoque.html">ESTOQUE</a>
                    <a href="#">CONTATO</a>
                    <a href="#">SOBRE</a>
                    <a class="contaUl" href="../../conta/login/login.php">
                        <span class="contaText">CONTA</span>
                        <i class="fa-solid fa-circle-user fa-xl contaIcon"></i></a>
                </ul>
            </div>
        </nav>
    </header>

    <div class="modalLogin modal modal-sheet position-relative vh-100 d-block bg-body-secondary p-4 py-md-5"
        tabindex="-1" role="dialog">
        <div class="modal-dialog position-absolute start-50 translate-middle" role="document" style="top: 30%;">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Fazer login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3 <?php echo $classAdd; ?>" name="email"
                                id="floatingInputLogin" placeholder="name@examplo.com">
                            <label for="floatingInputLogin">Email</label>
                            <div class="invalid-feedback login">
                                <?php echo $loginError; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3 <?php echo $classAdd; ?>"
                                name="password" id="floatingPasswordLogin" placeholder="Senha">
                            <label for="floatingPasswordLogin">Senha</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="submitLogin"
                            id="btnLogin">Login</button>
                        <small class="text-body-secondary textLogin">Não possui conta? Clique <a id="showSignBtn" onclick="showSignIn()">aqui</a> para
                            criar uma.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modalSign modal modal-sheet position-relative vh-100 d-none bg-body-secondary p-4 py-md-5" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Cadastrar-se</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" action="login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3 <?php echo $signClassAdd; ?>" name="email"
                                id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                            <div class="invalid-feedback">
                                <?php echo $signError; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3 <?php echo $signClassAdd; ?>"
                                name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Senha</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit"
                            name="submitSign">Cadastrar</button>
                        <small class="text-body-secondary">Clicando em Cadastrar, você concorda com os <a
                                href="#">termos de
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
                            Cadastrar com GitHub
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="login.js?v=1.45"></script>

</html>