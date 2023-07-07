
/* // ----------------- BARRA PESQUISAR ----------------- //  */

let nomeCarros = [], estoque = { carro: [] };

const searchInput = document.getElementById("searchInput"),
    resultSearch = document.querySelector(".resultSearch"),
    cardDestaquesCar = document.querySelectorAll(".cardDestaquesCar");

searchInput.addEventListener("focusout", () => {
    setTimeout(() => { resultSearch.classList.remove("active"); }, 100);
})

searchInput.addEventListener("keyup", () => {

    resultSearch.classList.add("active");

    let arr = [];
    let searchInputValue = searchInput.value.toLowerCase();
    arr = nomeCarros.filter((val) => {
        return val.toLowerCase().startsWith(searchInputValue);
    }).map(val => `<li class="resultSearchOpt noSelect">${val}</li>`).join("");
    if (arr.length) {
        resultSearch.innerHTML = arr;
        resultSearch.childNodes.forEach((element) => {
            element.addEventListener("click", (e) => {
                const targetEl = e.target;
                searchInput.value = targetEl.innerText;
                openBigPage(targetEl.innerText);
            })
        })
    }
    else resultSearch.innerHTML = `<li class="resultOpt noSelect">Nenhum encontrado</li>`;
})

cardDestaquesCar.forEach((e) =>{
    e.addEventListener("click", () =>{
        const valor = e.childNodes[1].childNodes[5].childNodes[1].innerText;
        openBigPage(valor);
    })
})


function carroSearch() {
    fetch("../Estoque/readDB.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        }
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        nomeCarros.length = 0;
        estoque.carro.length = 0;

        data.forEach((e) => {
            nomeCarros.push(e.nome);

            estoque.carro.push({
                nome: e.nome,
                marca: e.marca,
                modelo: e.modelo,
                versao: e.versao,
                ano: e.ano,
                preco: e.preco,
                transmissao: e.transmissao,
                quilometragem: e.quilometragem,
                infos: e.infos,
                img1: e.img1,
                img2: e.img2,
                img3: e.img3,
                img4: e.img4,
                img5: e.img5
            })
        })
    })
};

function openBigPage(valor) {
    estoque.carro.forEach((e) => {
        if (e.nome === valor) {
            createBigPage(e);
        }
    })
};

function createBigPage(e) {
    var novaPagina;

    novaPagina = window.open("", "_self");
    window.scroll({ top: 0 });
    novaPagina.document.write(
        `<!DOCTYPE html>
    <html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ziem Motors</title>
        <link rel="shortcut icon" href="../Imagens/icones-Logos/favicon/favicon-16x16.png" type="image/x-icon">
        <link rel="stylesheet" href="../PagCarro/pagcarro.css?v=1.47">
        <link rel="stylesheet" href="../geral.css?v=1.45">

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
                            <li><a href="../Estoque/estoque.php" class="nav-link px-3 link-body-emphasis navTitle">Estoque</a></li>
                            <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Contato</a></li>
                            <li><a href="#" class="nav-link px-3 link-body-emphasis navTitle">Sobre</a></li>
                        </ul>

                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../Imagens/icones-Logos/userIcon.svg" onerror="if (this.src != '../Imagens/icones-Logos/userIcon.svg') this.src = '../Imagens/icones-Logos/userIcon.svg';" alt="userImg" width="38" height="38"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="../conta/logado/conta.php">Conta</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </header>
    
        <main>
            <button class="cta" onclick="javascript:location.href='../Estoque/estoque.php'">
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
                <span>Voltar</span>
            </button>
            <button class="cta2" onclick="javascript:location.href='../Estoque/estoque.php'">
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
                <span>Voltar</span>
            </button>
            <h1 id="carTitle">${e.nome}</h1>
            <div class="carrouselWrapper">
                <div class="carrousel">
                    <div class="slide img1 onfocus">
                        <img src="${e.img1}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img1Car">
                    </div>
                    <div class="slide img2 ">
                        <img src="${e.img2}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img2Car">
                    </div>
                    <div class="slide img3">
                        <img src="${e.img3}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img3Car">
                    </div>
                    <div class="slide img4">
                        <img src="${e.img4}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img4Car">
                    </div>
                    <div class="slide img5">
                        <img src="${e.img5}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img5Car">
                    </div>
                </div>
            </div>
            <div class="carrouselMiniWrapper">
                <div class="carrouselMini">
                    <div class="slideMini img1">
                        <img src="${e.img1}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img1CarMini">
                    </div>
                    <div class="slideMini img2 onfocus">
                        <img src="${e.img2}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img2CarMini">
                    </div>
                    <div class="slideMini img3">
                        <img src="${e.img3}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img3CarMini">
                    </div>
                    <div class="slideMini img4">
                        <img src="${e.img4}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img4CarMini">
                    </div>
                    <div class="slideMini img5">
                        <img src="${e.img5}" onerror="if (this.src != '../Imagens/icones-Logos/fotoERRO.jpeg') this.src = '../Imagens/icones-Logos/fotoERRO.jpeg';" alt="img5CarMini">
                    </div>
                </div>
            </div>
    
            <div class="carInfos">
                <div class="sobreDiv">
                    <p class="sobreUnicTitle">Sobre o carro</p>
                    <div class="sobreUnic">
                        <span>Marca:</span>
                        <span id="marcaValue">${e.nome}</span>
                    </div>
                    <div class="sobreUnic">
                        <span>Modelo:</span>
                        <span id="modeloValue">${e.modelo}</span>
                    </div>
                    <div class="sobreUnic">
                        <span>Versao:</span>
                        <span id="versaoValue">${e.versao}</span>
                    </div>
                    <div class="sobreUnic">
                        <span>Ano:</span>
                        <span id="anoValue">${e.ano}</span>
                    </div>
                    <div class="sobreUnic">
                        <span>Preco:</span>
                        <span id="precoValue">${e.preco}</span>
                    </div>
                </div>
                <div class="informacoes">
                    <p class="sobreUnicTitle">Informações:</p>
                    <ul>
                        <li>${e.infos}</li>
                    </ul>
                </div>
                <div class="contato">
                    <div class="contatoTitle">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Contate o Vendedor</span>
                    </div>
                    <div class="contatoInput">
                        <input type="text" name="nameUser" id="nameUser" placeholder="Nome">
                        <input type="text" name="emailUser" id="emailUser" placeholder="Email">
                        <input type="text" name="telefoneUser" id="telefoneUser" placeholder="telefone">
                        <textarea name="msgUser" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
                        <button onclick="showModal('abrir')">ENVIAR</button>
                    </div>
                    <div class="contatoFooter">
                        <span>Compartilhe</span>
                        <div class="links">
                            <i class="fa-brands fa-whatsapp"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <dialog class="modalCriar">
            <div class="modalTitle">
                <span>Mensagem Enviada</span>
            </div>
            <div class="modalContent">
                <span>Confira seu email para receber mais informações.</span>
                <button class="ui-btn" onclick="showModal('fechar')">
                <span>okay</span>
                </button>
            </div>
        </dialog>
    
        <footer class="footer">
            <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
        </footer>
    </body>
    
    <script src="../PagCarro/pagcarro.js?v=1.46"></script>
    <script src="home.js?v=1.45"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous" async></script>
</html>`
    );
}

window.addEventListener("scroll", () =>{
    var header = document.querySelector(".navHeader");

    if(window.scrollY > 300){
        header.classList.add("stickyNav", window.scrollY > 300);

        const logoIcon = document.querySelector("#logoIcon");
        logoIcon.src = "../Imagens/icones-Logos/logoNOVOZIEMBLACK.png";

        const iconUser = document.querySelector("#iconUser");
        iconUser.src = "../Imagens/icones-Logos/userIconBlack.png";

        const linkNav = document.querySelector(".linkNav");
        linkNav.classList.add("sticky");
    }
    if(window.scrollY < 300){
        header.classList.remove("stickyNav", window.scrollY > 300);

        const logoIcon = document.querySelector("#logoIcon");
        logoIcon.src = "../Imagens/icones-Logos/logoNOVOZIEMWHITE.png";

        const iconUser = document.querySelector("#iconUser");
        iconUser.src = "../Imagens/icones-Logos/userIconWhite.png";

        const linkNav = document.querySelector(".linkNav");
        linkNav.classList.remove("sticky");
    }
})

carroSearch();