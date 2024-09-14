const navbar = document.querySelector('.navbar');
const dropdown = document.querySelector('.dropdown');

navbar.addEventListener('mouseenter',() =>{
    navbar.classList.add('active');
})

navbar.addEventListener('mouseleave',() =>{
    navbar.classList.remove('active');
})