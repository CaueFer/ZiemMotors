
function showSignIn() {

    const modalSign = document.querySelector(".modalSign"),
        modalLogin = document.querySelector(".modalLogin");


    modalSign.classList.remove('d-none');
    modalSign.classList.add('d-block');

    modalLogin.classList.remove('d-block');
    modalLogin.classList.add('d-none');
};
