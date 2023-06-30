// ---------------------  SLIDER -------------------------- //

var counter = 1;

setInterval(function () {
    const imgSlid = document.querySelectorAll('.imageSlider');
    imgSlid.forEach((e) =>{
        e.classList.remove('natela');
    });

    const imgTela = document.querySelector('.id' + counter);
    imgTela.classList.add('natela');

    document.getElementById('slide' + counter).checked = true;
    counter++;
    if (counter > 4) {
        counter = 1;
    }
}, 5000);



let nomeCarros = [];

const searchInput = document.getElementById("searchInput"),
    resultSearch = document.querySelector(".resultSearch"),
    resultSearchOpt = document.querySelectorAll(".resultSearchOpt");

searchInput.addEventListener("focus", () =>{
    carroSearch();
})

searchInput.addEventListener("keyup", () => {
    
    resultSearch.classList.add("active");

    let arr = [];
    let searchInputValue = searchInput.value.toLowerCase();
    arr = nomeCarros.filter((val) => {
        return val.toLowerCase().startsWith(searchInputValue);
    }).map(val => `<li class="resultSearchOpt noSelect">${val}</li>`).join("");
    if(arr.length){
        resultSearch.innerHTML = arr;
    }
    else resultSearch.innerHTML= `<li class="resultOpt noSelect">Nenhum encontrado</li>`;
})

resultSearchOpt.forEach((e) =>{
    e.addEventListener("click", () =>{
        console.log("cliquei");
        searchInput.value = resultOpt.innerText;
        resultSearch.classList.remove("active");
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

        data.forEach((e) => {
            nomeCarros.push(e.nome);
        })
    })
};

