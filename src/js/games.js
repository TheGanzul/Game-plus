//MENUS
const moreOptions = document.querySelector("#bmore");
const bShowMobileLinks = document.querySelector("#bmenu");
const mobileMenu = document.querySelector(".links");
const moreMenu = document.querySelector(".more .menu");

bShowMobileLinks.addEventListener("click", (e) => {
    e.preventDefault();
    mobileMenu.classList.toggle("show");
});

moreOptions.addEventListener("click", (e) => {
    e.preventDefault();
    moreMenu.classList.toggle("show");
});

//INFO
document.addEventListener("DOMContentLoaded", function () {
    const description = document.querySelector(".description");
    const readMoreButton = document.querySelector(".read-more");

    readMoreButton.addEventListener("click", function () {
      description.classList.toggle("expanded");
      if (description.classList.contains("expanded")) {
        readMoreButton.textContent = "See Less";
      } else {
        readMoreButton.textContent = "Read more";
      }
    });
  });
//SLIDER

const slider = document.querySelector('#slider');
let sliderSection = document.querySelectorAll(".slider_section");
let sliderSectionLast = sliderSection[sliderSection.length -1];

const prevButton = document.querySelector('#Previous');
const nextButton = document.querySelector('#Next');

slider.insertAdjacentElement('afterbegin', sliderSectionLast);

// Función para cambiar al siguiente slide
function nextSlide() {

    let sliderSectionFirst = document.querySelectorAll(".slider_section")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.7s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('beforeend', sliderSectionFirst);
        slider.style.marginLeft ="-100%";
    }, 700);
}

// Función para cambiar al slide anterior
function prevSlide() {
    let sliderSection = document.querySelectorAll(".slider_section");
    let sliderSectionLast = sliderSection[sliderSection.length -1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.7s";
    setTimeout(function(){
        slider.style.transition = "none";
        slider.insertAdjacentElement('afterbegin', sliderSectionLast);
        slider.style.marginLeft ="-100%";
    }, 700);
}
// Manejadores de eventos para los botones
nextButton.addEventListener('click', function(){
    nextSlide();
});
prevButton.addEventListener('click', function(){
    prevSlide();
});

// Función para cambiar automáticamente al siguiente slide
function autoSlide() {
    nextSlide();
}

// Intervalo para cambio automático cada # segundos
let autoInterval = setInterval(autoSlide, 3000);

// Función para detener el cambio automático
function stopAutoSlide() {
    clearInterval(autoInterval);
    autoInterval = setInterval(autoSlide, 5000); // Reiniciar el intervalo
}

// Manejadores de eventos para los botones
nextButton.addEventListener('click', function(){
    nextSlide();
    stopAutoSlide();
});

prevButton.addEventListener('click', function(){
    prevSlide();
    stopAutoSlide();
});




