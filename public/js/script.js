
// add active class to active item in nav


const navlink = document.querySelectorAll('.nav__item');

function addactive(){
    navlink.forEach( n => n.classList.remove('active'));
    this.classList.add('active');
}

navlink.forEach(n=> n.addEventListener('click',addactive))

/********* show nav in small screens ************/
const togglebtn = document.querySelector('.header__toggle');
const closebtn =  document.querySelector('.nav__close');

togglebtn.addEventListener('click',function(){
    document.querySelector('.nav').classList.add('show')
})
closebtn.addEventListener('click',function(){
    document.querySelector('.nav').classList.remove('show')
})


//  ========================= Show form script ====================
const form = document.querySelector('.form-content');
const showform = document.querySelector('.showform');
const closeform = document.querySelector('.closeform');
// const formedit = document.querySelector('.form-content-ed');
// const showformed = document.querySelector('.showformed');
// const closeformed = document.querySelector('.closeformed');
showform.onclick = function(){
    // formedit.classList.remove('show')
    form.classList.toggle('show')
}
closeform.onclick = function(){

    // formedit.classList.remove('show')
    form.classList.remove('show')

// }
// showformed.onclick = function(){
//     formedit.classList.add('show')
//     form.classList.remove('show')
// }
// closeformed.onclick = function(){

//     formedit.classList.remove('show')
//     form.classList.remove('show')

}
