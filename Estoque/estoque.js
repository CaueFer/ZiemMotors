

/* // ----------------- FILTRO MARCA ----------------- //  */

const marcaTitle = document.querySelector('.marcaTitle');
const marcaFilter = document.querySelector('.marcaFilter');

marcaTitle.addEventListener('click', (e) => {

    marcaFilter.classList.toggle('active');
    priceFilter.classList.remove('off');
    anoFilter.classList.remove('active');
})

const marcaOptionsSelect = document.querySelectorAll('.marcaOpt');
const marcaSelect = document.querySelector('#selectMarca')

marcaOptionsSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;
        marcaSelect.innerHTML = "";
        marcaSelect.insertAdjacentText('beforeend', "Selecionado: " + targetEl.innerText.substr(0, 7));
        marcaFilter.classList.remove('active');
    })
})


/* // ----------------- FILTRO PRECO ----------------- //  */

const priceTitle = document.querySelector('.priceTitle');
const priceFilter = document.querySelector('.priceFilter');

priceTitle.addEventListener('click', (e) => {

    priceFilter.classList.toggle('off');
    marcaFilter.classList.remove('active');
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

let rangeGap = 1000000;

rangeInput.forEach(input => {
    input.addEventListener("input", (e) => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < rangeGap) {
            if (e.target.className === "rangeMin") {
                rangeInput[0].value = maxVal - rangeGap;
            } else {
                rangeInput[1].value = minVal + rangeGap;
            }
        } else {
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";

            fieldValue[0].value = minVal;
            fieldValue[1].value = maxVal;
        }
    })
});

fieldValue.forEach(input => {
    input.addEventListener("input", (e) => {
        let minVal = parseInt(fieldValue[0].value),
            maxVal = parseInt(fieldValue[1].value);

        if ((maxVal - minVal >= rangeGap) && maxVal <= 10000000) {
            if (e.target.className === "inputMin") {
                rangeInput[0].value = minVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                console.log(maxVal);
            } else {
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        } else if (maxVal > 10000000) {
            if (e.target.className === "inputMax") {
                rangeInput[1].value = 10000000;
                progress.style.right = 100 - (10000000 / rangeInput[1].max) * 100 + "%";
            }
        }
    })
});

/* // ----------------- FILTRO ANO ----------------- //  */

const anoTitle = document.querySelector('.anoTitle');
const anoFilter = document.querySelector('.anoFilter');

anoTitle.addEventListener('click', (e) => {

    anoFilter.classList.toggle('active');
    marcaFilter.classList.remove('active');
    priceFilter.classList.remove('off');
})

const anoOptionsSelect = document.querySelectorAll('.anoOpt');
const anoSelect = document.querySelector('#selectAno')

anoOptionsSelect.forEach((e) => {
    e.addEventListener('click', (e) => {
        const targetEl = e.target;
        anoSelect.innerHTML = "";
        anoSelect.insertAdjacentText('beforeend', "Selecionado: " + targetEl.innerText.substr(0, 7));
        anoFilter.classList.remove('active');
    })
})


/* // ----------------- CARRO MODAL ----------------- //  */


function cadastroCarro(estado) {
    const modalCar = document.querySelector(".modalCriar");

    if (estado === "abrir") {
        modalCar.show();
    } else {
        modalCar.close();
    }

}

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
                        console.log("NENHUMA IMAGEM SELECIONADA")
                        break;
                }

            });
            reader.readAsDataURL(file);
        }
    })
});


// IMG INPUT CONFIG  -----------------------------------------------------  // 
const estoque = { carro: [] };
const newCar = { cartoAdd: [] };


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
        img1: img1Src,
        img2: img2Src,
        img3: img3Src,
        img4: img4Src,
        img5: img5Src
    })

    if (estoque.carro.length !== 0) {
        estoque.carro.forEach((e) => {
            if (newCar.cartoAdd[0].nome !== e.nome) {
                addValidCar();
                createCard();
                cadastroCarro('fechar');
            } else {
                alert("JA EXISTE CARRO COM O MESMO NOME")
            }
        })
    } else {
        addValidCar();
        createCard();
        cadastroCarro('fechar');
    };

    newCar.cartoAdd.length = 0;
};

function addValidCar() {
    estoque.carro.push({
        nome: carName.value,
        marca: carMarca.value,
        modelo: carModelo.value,
        versao: carVersao.value,
        ano: carAno.value,
        preco: carPreco.value,
        transmissao: carTransmi.value,
        quilometragem: carQuilo.value,
        infos: carInfos.value,
        img1: img1Src,
        img2: img2Src,
        img3: img3Src,
        img4: img4Src,
        img5: img5Src
    })
};


function createCard() {

    //newCar.cartoAdd[0].nome

    const carrosEstoque = document.querySelector('.carrosEstoque');

    carrosEstoque.insertAdjacentHTML("beforeend",
        `<section class="cardCarro">
            <img src="${newCar.cartoAdd[0].img1}" alt="cardImg">
                <div class="cardContent">
                    <span class="cardContentTitle">${newCar.cartoAdd[0].nome}</span>
                    <span class="cardContentPrice">R$${newCar.cartoAdd[0].preco}</span>
                    <div class="cardContentSpecs">
                        <div class="Specs">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span>${newCar.cartoAdd[0].quilometragem}</span>
                        </div>
                        <div class="Specs">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>${newCar.cartoAdd[0].transmissao}</span>
                        </div>
                        <div class="Specs">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>${newCar.cartoAdd[0].ano}</span>
                        </div>
                        <div class="Specs">
                            <i class="fa-solid fa-gas-pump"></i>
                            <span>Gasolina</span>
                        </div>
                    </div>
                    <button id="BtnDetails" onclick="openBigPage(event)">Mais detalhes<i class="fa-solid fa-chevron-up fa-rotate-90"></i></button>
                </div>
        </section>`
    )
};

var novaPagina;

function openBigPage(e) {
    const targetEl = e.target.closest("div").childNodes[1].innerText;

    estoque.carro.forEach((e) => {
        if (e.nome === targetEl) {
            createBigPage(e);
        }
    })
};

function closeBigPage() {
};

function createBigPage(e) {
    console.log(e.nome);


    novaPagina = window.open("", "_self");
    novaPagina.document.write(
        `<!DOCTYPE html>
    <html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ziem Motors</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="/Imagens/icones-Logos/favicon/favicon-16x16.png" type="image/x-icon">
        <link rel="stylesheet" href="/PagCarro/pagcarro.css">
        <link rel="stylesheet" href="/geral.css">
    </head>
    
    <body>
        <header>
            <nav>
                <div class="logo"><a href="/home/home.html"><img src="/Imagens/icones-Logos/logoZIEM.png" alt="logoImg"></a>
                </div>
                <div class="navMenu">
                    <ul>
                        <a href="/Estoque/estoque.html">ESTOQUE</a>
                        <a href="#">CONTATO</a>
                        <a href="#">SOBRE</a>
                        <a href="/conta/conta.html"><i class="fa-solid fa-circle-user fa-xl"></i></a>
                    </ul>
                </div>
            </nav>
        </header>
    
        <main>
            <button class="cta" onclick="javascript:location.href='/Estoque/estoque.html'">
                <span>Voltar</span>
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </button>
            <button class="cta2" onclick="javascript:location.href='/Estoque/estoque.html'">
                <span>Voltar</span>
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </button>
            <h1 id="carTitle">${e.nome}</h1>
            <div class="carrouselWrapper">
                <div class="carrousel">
                    <div class="slide img1 onfocus">
                        <img src="${e.img1}" alt="">
                    </div>
                    <div class="slide img2 ">
                        <img src="${e.img2}" alt="">
                    </div>
                    <div class="slide img3">
                        <img src="${e.img3}" alt="">
                    </div>
                    <div class="slide img4">
                        <img src="${e.img4}" alt="">
                    </div>
                    <div class="slide img5">
                        <img src="${e.img5}" alt="">
                    </div>
                </div>
            </div>
            <div class="carrouselMiniWrapper">
                <div class="carrouselMini">
                    <div class="slideMini img1">
                        <img src="${e.img1}" alt="">
                    </div>
                    <div class="slideMini img2 onfocus">
                        <img src="${e.img2}" alt="">
                    </div>
                    <div class="slideMini img3">
                        <img src="${e.img3}" alt="">
                    </div>
                    <div class="slideMini img4">
                        <img src="${e.img4}" alt="">
                    </div>
                    <div class="slideMini img5">
                        <img src="${e.img5}" alt="">
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
                        <input type="text" name="nameUser" id="" placeholder="Nome">
                        <input type="text" name="emailUser" id="" placeholder="Email">
                        <input type="text" name="telefoneUser" id="" placeholder="telefone">
                        <textarea name="msgUser" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
                        <button>ENVIAR</button>
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
                <img id="logoCar" src="/Imagens/icones-Logos/logo-lambo.png" alt="logoMarca">
            </div>
        </main>
    
        <footer class="footer">
                <p>© 1999-2023 ZiemMotors LTDA. Todos os direitos reservados.</p>
        </footer>
    </body>
    
    <script src="/PagCarro/pagcarro.js"></script>

    </html>`

    );
}




