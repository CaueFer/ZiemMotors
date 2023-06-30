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
