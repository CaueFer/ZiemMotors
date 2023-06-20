
/* // -------------------- CONTATO MENSAGEM -------------------- //  */

const nameUser = document.querySelector("#nameUser"),
    emailUser = document.querySelector("#emailUser"),
    telefoneUser = document.querySelector("#telefoneUser"),
    modalCriar = document.querySelector(".modalCriar");

function showModal(estado){
    if (estado === "abrir"){
        modalCriar.showModal();
    } else {
        modalCriar.close();
    }
};


/* // -------------------- carousel -------------------- //  */

const slideMini = document.querySelectorAll('.slideMini'),
    slideGrande = document.querySelectorAll('.slide');

slideMini.forEach((e) => {
    e.addEventListener("click", (e) => {
        const targetEl = e.target;

        const targetId = targetEl.closest('div').classList[1];

        slideGrande.forEach((div) => {
            if (div.classList[1] === targetId) {
                div.classList.add('active');
                div.classList.add('onfocus');
            } else {
                div.classList.remove('active');
                div.classList.remove('onfocus');
            }
        });
    })
});

