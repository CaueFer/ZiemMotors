<?php
session_start();
$navOptions = '<li><a class="dropdown-item" href="../conta/login/login.php">Fazer Login</a></li>';
$addCadastro = "";

if (isset($_SESSION['email']) == true) {
    $navOptions = '<li><a class="dropdown-item" href="../conta/logado/conta.php">Configuracoes</a></li>
    <li><a class="dropdown-item" href="../conta/logado/conta.php">Perfil</a></li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li><a class="dropdown-item" href="../conta/login/sair.php">Sair</a></li>';


    // validacao adm
    include_once('../conta/login/config.php');
    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM usuarios WHERE email = '$logado' AND admin = '1';";

    $validacao = $conexao->query($sql);

    if (mysqli_num_rows($validacao) > 0) {
        // botao cadastro
        $addCadastro = 'show';
    }
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
    <link rel="stylesheet" href="estoque.css">
    <link rel="stylesheet" href="../geral.css?v=1.46">

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
                    <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a></li>
                    <li><a href="../contato/contato.php" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
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
        <dialog class="modalCriar">
            <div class="modalTitle">
                <span>Cadastrar Carro</span>
                <i onclick="modalCadastroCarro('fechar')" class="fa-solid fa-x fa-lg"></i>
            </div>
            <div class="modalContent">
                <div class="name">
                    <span>Nome</span>
                    <input type="text" class="carName carModal" maxlength="50">
                </div>
                <div class="marca">
                    <span>marca</span>
                    <input type="text" class="carMarca carModal" maxlength="30">
                </div>
                <div class="modelo">
                    <span>modelo</span>
                    <input type="text" class="carModelo carModal" maxlength="30">
                </div>
                <div class="versao">
                    <span>versao</span>
                    <input type="text" class="carVersao carModal" maxlength="30">
                </div>
                <div class="ano">
                    <span>ano</span>
                    <input type="number" class="carAno carModalNumb" min="1900" max="2099" step="1"/>
                </div>
                <div class="preco">
                    <span>preco</span>
                    <input type="number" step="any" placeholder="10000000" class="carPreco carModalNumb" maxlength="10">
                </div>
                <div class="transmissao">
                    <span>transmissao</span>
                    <select name="carTransmi" id="" class="carTransmi">
                        <option value="Automatica">Automatica</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="quilometragem">
                    <span>quilometragem</span>
                    <input type="number" class="carQuilo carModalNumb">
                </div>
                <div class="infos">
                    <span>Informacoes</span>
                    <textarea class="carInfos" name="infos" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="imgCarros">
                    <span>Imagens</span>
                    <div class="imgCar 1">
                        <input id="imgInput1" class="imgInputClass" type="file" accept="image/*">
                        <label class="imgInputLabel" for="imgInput1">
                            <span>ADD IMAGE</span>
                        </label>
                    </div>
                    <div class="imgCar 2">
                        <input id="imgInput2" class="imgInputClass" type="file" accept="image/*">
                        <label class="imgInputLabel" for="imgInput2">
                            <span>ADD IMAGE</span>
                        </label>
                    </div>
                    <div class="imgCar 3">
                        <input id="imgInput3" class="imgInputClass" type="file" accept="image/*">
                        <label class="imgInputLabel" for="imgInput3">
                            <span>ADD IMAGE</span>
                        </label>
                    </div>
                    <div class="imgCar 4">
                        <input id="imgInput4" class="imgInputClass" type="file" accept="image/*">
                        <label class="imgInputLabel" for="imgInput4">
                            <span>ADD IMAGE</span>
                        </label>
                    </div>
                    <div class="imgCar 5">
                        <input id="imgInput5" class="imgInputClass" type="file" accept="image/*">
                        <label class="imgInputLabel" for="imgInput5">
                            <span>ADD IMAGE</span>
                        </label>
                    </div>
                    <div class="btnCadastroModal">
                        <button onclick="addValues()">CADASTRAR CARRO</button>
                    </div>
                </div>
            </div>
        </dialog>


        <!-- main content ---------------  -->
        <aside class="asideNav">
            <ul class="asideUl noSelect">
                <p class="asideTitle">Filtros</p>
                <div class="marcaFilter">
                    <div class="marcaTitle">
                        <span>Marca</span>
                    </div>
                    <div class="content">
                        <ul class="optionsMarca" id="marcaOptions">
                            <li class="marcaOpt" id="audiOpt"><span>Audi</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="bmwOpt"><span>BMW</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="ferrariOpt"><span>Ferrari</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="lamboOpt"><span>Lamborghini</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="mclarenOpt"><span>McLaren</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="mercedesOpt"><span>Mercedes-Benz</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="porscheOpt"><span>Porsche</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                            <li class="marcaOpt" id="teslaOpt"><span>Tesla</span><i class="fa-solid fa-x fa-lg closeSelect"></i></li>
                        </ul>
                    </div>
                </div>

                <div class="priceFilter">
                    <div class="priceTitle">
                        <span>Preco</span>
                        <i class="fa-solid fa-angle-up"></i>
                    </div>
                    <div class="contentPrice">
                        <span id="selectPrice">Intervalo de preço</span>
                        <div class="priceInput options">
                            <div class="field">
                                <span>Min</span>
                                <span class="dentro">R$</span>
                                <input type="text" class="inputMin" id="input" maxlength="13" value="2500000">
                            </div>
                            <div class="slider">
                                <div class="progess"></div>
                            </div>
                            <div class="rangeInput">
                                <input type="range" class="rangeMin" min="100000" max="10000000" value="2500000"
                                    step="10000">
                                <input type="range" class="rangeMax" min="100000" max="10000000" value="10000000"
                                    step="10000">
                            </div>
                            <div class="field">
                                <span>Max</span>
                                <span class="dentro">R$</span>
                                <input type="text" class="inputMax" id="input" maxlength="14" value="10000000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="anoFilter">
                    <div class="anoTitle">
                        <span>Ano</span>
                        <i class="fa-solid fa-angle-up"></i>
                    </div>
                    <div class="contentAno">
                        <span id="selectAno">Selecionado: N/A</span>
                        <ul class="optionsAno" id="anoOptions">
                            <li class="anoOpt">Nenhum</li>
                            <li class="anoOpt">2000</li>
                            <li class="anoOpt">2002</li>
                            <li class="anoOpt">2004</li>
                            <li class="anoOpt">2008</li>
                            <li class="anoOpt">2012</li>
                            <li class="anoOpt">2015</li>
                            <li class="anoOpt">2020</li>
                            <li class="anoOpt">2023</li>
                        </ul>
                    </div>
                </div>
            </ul>
        </aside>

        <div class="mainContent">
            <button onclick="modalCadastroCarro('abrir')" class="fancy mb-3 btnCadastrar <?php echo $addCadastro ?>">
                <span class="top-key"></span>
                <span class="text">CADASTRAR CARRO</span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </button>
            <article class="carrosEstoque row">
            </article>
        </div>

    </main>
    <footer class="footer">
        <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
    </footer>
</body>

<script src="estoque.js?v=1.45"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>