
// IMG INPUT CONFIG  -----------------------------------------------------  // 

const imgInput = document.querySelectorAll(".imgInputClass");
var img1Src, img2Src, img3Src, img4Src, img5Src;

imgInput.forEach((e) => {
    e.addEventListener("change", (e) => {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        const parentEl = inputTarget.closest("div");
        const ImgInputLabel = parentEl.childNodes[3];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", (e) => {
                const readerTarget = e.target;

                if (ImgInputLabel.childNodes[2]) {
                    ImgInputLabel.childNodes[2].remove();
                }
                const img = document.createElement("img");
                img.setAttribute('id', 'imgInpultImage');
                const imgResult = readerTarget.result;
                img.src = imgResult;
                ImgInputLabel.appendChild(img);

                switch (parentEl.classList.value) {

                    case "imgCar 1":
                        img1Src = imgResult
                        break;

                    case "imgCar 2":
                        img2Src = imgResult
                        break;

                    case "imgCar 3":
                        img3Src = imgResult
                        break;

                    case "imgCar 4":
                        img4Src = imgResult
                        break;

                    case "imgCar 5":
                        img5Src = imgResult
                        break;

                    default:
                        alert("NENHUMA IMAGEM SELECIONADA");
                        break;
                }

            });
            reader.readAsDataURL(file);
        }
    })
});


// CADASTRO CARROS INPUTS -----------------------------------------------------  // 
const estoque = { carro: [] },
    newCar = { cartoAdd: [] },
    marcaToFilter = [],
    anoToFilter = [];

var minPriceToFilter, maxPriceToFilter;

const carName = document.querySelector(".carName"),
    carMarca = document.querySelector(".carMarca"),
    carModelo = document.querySelector(".carModelo"),
    carVersao = document.querySelector(".carVersao"),
    carAno = document.querySelector(".carAno"),
    carPreco = document.querySelector(".carPreco"),
    carTransmi = document.querySelector(".carTransmi"),
    carInfos = document.querySelector(".carInfos"),
    carQuilo = document.querySelector(".carQuilo");

function addValues() {
    newCar.cartoAdd.push({
        nome: carName.value,
        marca: carMarca.value,
        modelo: carModelo.value,
        versao: carVersao.value,
        ano: carAno.value,
        preco: carPreco.value,
        transmissao: carTransmi.value,
        quilometragem: carQuilo.value,
        infos: carInfos.value,
        img1: img1Src ? img1Src : "noIMG",
        img2: img2Src ? img2Src : "noIMG",
        img3: img3Src ? img3Src : "noIMG",
        img4: img4Src ? img4Src : "noIMG",
        img5: img5Src ? img5Src : "noIMG"
    })

    addValidCarDB();
    modalCadastroCarro('fechar');
    newCar.cartoAdd.length = 0;

};

/* // ----------------- SAVE CADASTRO INTO JSON ----------------- //  */
function addValidCarDB() {

    fetch("saveDB.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(newCar.cartoAdd)

    }).then(function (response) {
        return response.text();
    }).then(function (data) {
        console.log("SAVEDB", data);

        estoqueCarroUpdate();
    })
};


/* // ----------------- UPDATE ARRAY ESTOQUE BASEADO NO DB ----------------- //  */
function estoqueCarroUpdate() {
    fetch("readDB.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        }
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        estoque.carro.length = 0;

        data.forEach((e) => {
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
        createCard();
    })
};


/* // ----------------- CRIAR CARD PEQUENO ----------------- //  */
function createCard() {
    const carrosEstoque = document.querySelector('.carrosEstoque');
    var filterArray = estoque.carro;

    while (carrosEstoque.firstChild) {
        carrosEstoque.removeChild(carrosEstoque.lastChild)
    }

    const formatarNumeroPreco = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });

    //console.log(marcaToFilter, anoToFilter, minPriceToFilter, maxPriceToFilter)

    if (marcaToFilter.length > 0) {
        if(marcaToFilter !== undefined){
            filterArray = estoque.carro.filter((val) => {
                return marcaToFilter.find((e) => {
                    return val.marca.toLowerCase() === e.toLowerCase();
                });
            })
        }
    }
    if (anoToFilter > 0) {
        filterArray = filterArray.filter((val) => {
            return val.ano >= anoToFilter;
        })
    }
    if (minPriceToFilter !== undefined) {
        filterArray = filterArray.filter((val) => {
            return val.preco >= minPriceToFilter && val.preco <= maxPriceToFilter;
        })
    }

    if (carrosEstoque.childElementCount < 1) {
        filterArray.forEach((e) => {
            var precoRegional = formatarNumeroPreco.format(e.preco);

            carrosEstoque.insertAdjacentHTML("beforeend",
                `<div class="cardSobreCarro col-12">
                    <section class="cardCarro">
                        <img src="${e.img1}" alt="cardImg">
                        <div class="cardContent">
                            <span class="cardContentTitle">${e.nome}</span>
                            <span class="cardContentPrice">${precoRegional}</span>
                            <div class="cardContentSpecs">
                                <div class="Specs">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    <span>${e.quilometragem}</span>
                                </div>
                                <div class="Specs">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    <span>${e.transmissao}</span>
                                </div>
                                <div class="Specs">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>${e.ano}</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <button class="btnBigPage" onclick="openBigPage(event)"></button>
                </div>`
            )
        })
    }

    limparInput();
};


/* // ----------------- LIMPAR INPUTS ----------------- //  */
function limparInput() {
    carName.value = "";
    carMarca.value = "";
    carModelo.value = "";
    carVersao.value = "";
    carAno.value = "";
    carPreco.value = "";
    carTransmi.value = "";
    carQuilo.value = "";
    carInfos.value = "";

    const imgCar = document.querySelectorAll(".imgCar");

    imgCar.forEach((e) => {
        const ImgInputLabel = e.childNodes[3];

        if (ImgInputLabel.childNodes[2]) {
            ImgInputLabel.childNodes[2].remove();
        }
    });
}


function openBigPage(recebido, normal) {
    if (normal === "searched") {
        estoque.carro.forEach((e) => {
            if (e.nome === recebido) {
                createBigPage(e);
            }
        })
    }
    else {
        const targetEl = recebido.target.closest("div").childNodes[1].childNodes[3].childNodes[1].innerText;

        estoque.carro.forEach((e) => {
            if (e.nome === targetEl) {
                createBigPage(e);
            }
        })
    }
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
                    <img id="logoCar" src="../Imagens/icones-Logos/logo-lambo.png" alt="logoMarca">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js?v=1.45"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous" async></script>
</html>`
    );
}

/* // ----------------- FILTRO MARCA ----------------- //  */

const marcaOptionsSelect = document.querySelectorAll('.marcaOpt'),
    closeSelect = document.querySelectorAll('.closeSelect');


marcaOptionsSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;

        if (!targetEl.classList.contains('closeSelect')) {
            targetEl.classList.add("active");
            filterCarMarca(targetEl);
        }
    })
})

closeSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;

        const targetLi = targetEl.closest('li');
        targetLi.classList.remove("active");

        const indexTarget = marcaToFilter.indexOf(targetLi.innerText);
        if (indexTarget > -1) {
            marcaToFilter.splice(indexTarget, 1);
        }

        createCard();
    })
})

function filterCarMarca(alvo) {

    if (marcaToFilter.length === 0) {
        marcaToFilter.push(alvo.innerText);
    } else {
        if (!marcaToFilter.includes(alvo.innerText)) {
            marcaToFilter.push(alvo.innerText);
        }
    };

    createCard();
}

/* // ----------------- FILTRO PRECO ----------------- //  */

const priceTitle = document.querySelector('.priceTitle');
const priceFilter = document.querySelector('.priceFilter');

priceTitle.addEventListener('click', (e) => {

    priceFilter.classList.toggle('active');
    anoFilter.classList.remove('active');
})

const priceOptionsSelect = document.querySelectorAll('.priceOpt');
const priceSelect = document.querySelector('#selectPrice')

priceOptionsSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;
        priceSelect.innerHTML = "";
        priceSelect.insertAdjacentText('beforeend', "Selecionado: " + targetEl.innerText.substr(0, 7));
        priceFilter.classList.remove('off');
    })
})

const rangeInput = document.querySelectorAll(".rangeInput input"),
    progress = document.querySelector(".progess"),
    fieldValue = document.querySelectorAll(".field #input");

let rangeGap = 1000000; // 1 MILHAO

const formatarNumeroPreco = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    currencyDisplay: 'symbol'
});

rangeInput.forEach(input => {
    input.addEventListener("input", (e) => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < rangeGap) {
            if (e.target.className === "rangeMin") {
                rangeInput[0].value = formatarNumeroPreco.format(maxVal - rangeGap).split('R$')[1];
            } else {
                rangeInput[1].value = formatarNumeroPreco.format(minVal + rangeGap).split('R$')[1];
            }
        } else {
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";

            fieldValue[0].value = formatarNumeroPreco.format(minVal).split('R$')[1];
            fieldValue[1].value = formatarNumeroPreco.format(maxVal).split('R$')[1];
        }
        minPriceToFilter = minVal;
        maxPriceToFilter = maxVal;
        createCard();
    })
});

fieldValue.forEach(input => {
    input.addEventListener("input", (e) => {
        let minNumber = fieldValue[0].value,
            maxNumber = fieldValue[1].value,
            minVal = Number(minNumber.replace(/[^0-9]+/gi, "")),
            maxVal = Number(maxNumber.replace(/[^0-9]+/gi, ""));

        if ((maxVal - minVal >= rangeGap) && maxVal <= 10000000) {
            if (e.target.className === "inputMin") {
                rangeInput[0].value = minVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            } else {
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        } else if (maxVal > 10000000) {
            if (e.target.className === "inputMax") {
                rangeInput[1].value = "";
                rangeInput[1].value = 10000000;
                progress.style.right = 100 - (10000000 / rangeInput[1].max) * 100 + "%";
            }
        } else if (minVal > 9999999) {
            if (e.target.className === "inputMin") {
                rangeInput[0].value = '9.000.000';
                progress.style.right = 100 - (9000000 / rangeInput[1].max) * 100 + "%";
            }
        }
        minPriceToFilter = minVal;
        maxPriceToFilter = maxVal;
        createCard();
    })
});

/* // ----------------- FILTRO ANO ----------------- //  */

const anoTitle = document.querySelector('.anoTitle');
const anoFilter = document.querySelector('.anoFilter');

anoTitle.addEventListener('click', (e) => {

    anoFilter.classList.toggle('active');
})

const anoOptionsSelect = document.querySelectorAll('.anoOpt');
const anoSelect = document.querySelector('#selectAno')

anoOptionsSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;
        anoSelect.innerHTML = "";
        console.log(targetEl.innerText);
        if (targetEl.innerText === "Nenhum") {
            anoSelect.insertAdjacentText('beforeend', "Selecionado: Nenhum");
            anoFilter.classList.remove('active');
            createCard();
        }
        else {
            anoSelect.insertAdjacentText('beforeend', "Acima de: " + targetEl.innerText.substr(0, 7));
            anoFilter.classList.remove('active');
            anoToFilter.splice(0, 1, targetEl.innerText);
            createCard();
        }
    })
})


/* // ----------------- CARRO MODAL ----------------- //  */
function modalCadastroCarro(estado) {
    const modalCar = document.querySelector(".modalCriar");

    if (estado === "abrir") {
        modalCar.show();
    } else {
        modalCar.close();
        limparInput();
    }

}
/* // ----------------- ATUALIZAR PAGE ----------------- //  */
window.addEventListener("load", () => {
    estoqueCarroUpdate();
})

/* // ----------------- BARRA PESQUISAR ----------------- //  */
let nomeCarros = [];

const searchInput = document.getElementById("searchInput"),
    resultSearch = document.querySelector(".resultSearch");

searchInput.addEventListener("focus", () => {
    carroSearch();
})

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
                openBigPage(targetEl.innerText, "searched");
            })
        })
    }
    else resultSearch.innerHTML = `<li class="resultOpt noSelect">Nenhum encontrado</li>`;

})

function carroSearch() {
    fetch("readDB.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        }
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        nomeCarros.length = 0;

        data.forEach((e) => {
            nomeCarros.push(e.nome);
        })
    })
};
