
/* // -------------------- carousel -------------------- //  */

const slideMini = document.querySelectorAll('.slideMini'),
    slideGrande = document.querySelectorAll('.slide');

slideMini.forEach((e) => {
    e.addEventListener("click", (e) => {
        const targetEl = e.target;

        const targetId = targetEl.closest('div').classList[1];

        slideGrande.forEach((div) => {
            if(div.classList[1] === targetId){
                div.classList.add('active');
                div.classList.add('onfocus');
            } else{
                div.classList.remove('active');
                div.classList.remove('onfocus');
            }
        });
    })
})

/* // -------------------- carousel fim -------------------- //  */