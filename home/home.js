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

// ---------------------  SLIDER FIM  -------------------------- //
