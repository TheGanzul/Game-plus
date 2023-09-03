//Menus
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

//Videos

const videos = [
    {
      id: "PyMlV5_HRWk",
    },
    {
      id: "XCbMVbeKlCg",
    },
    {
      id: "Fmdb-KmlzD8",
    },
    {
      id: "lOthvD1rMbQ",
    },
    {
      id: "nXDk86lQhto",
    },
  ];

const sliderContainer = document.querySelector("#slider");
const currentContainer = document.querySelector("#current");
const videosContainer = document.querySelector("#videos-container");
const bNext = document.querySelector("#next");
const bPrev = document.querySelector("#prev");
let current = 0;

bNext.addEventListener("click", (e) => {
    let changed = current;
    current = current + 1 < videos.length ? current + 1 : current - videos.length + 1;
    if (current !== changed) {
      renderCurrentVideo(videos[current].id);
    }
  });
bPrev.addEventListener("click", (e) => {
    let changed = current;
    current = current - 1 >= 0 ? current - 1 : current + videos.length -1;
    if (current !== changed) {
      renderCurrentVideo(videos[current].id);
    }
  });
  
  renderCurrentVideo(videos[current].id);
  
function renderCurrentVideo(id) {
    currentContainer.innerHTML = `<iframe width="100%" height="720" src="https://www.youtube.com/embed/${id}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
  }

//POSTERS Slider para free games y paid games
const sliderContainers = document.querySelectorAll('.slider-container'); //Selecciona los contenedores de sliders en la pagina y los almacena en la variable sliderContainers

sliderContainers.forEach(container => {
    const slider = container.querySelector('.slider'),
          sliderButtons = container.querySelectorAll('.slider-button'); //Selecciona el elemento del slider y los botones de navegación dentro del contenedor actual
                            
                    //Se definen varias variables y funciones para gestionar la interacción con el slider
    let isDragStart = false, //Controla si se ha iniciado el slider
        isDragging = false, // Controla si se está arrastrando el slider
        prevPageX,          //Almacena la posición X del cursor/touch en el último evento
        prevScrollLeft,     //Almacena el valor del desplazamiento horizontal del slider en el último evento
        positionDiff;       //Almacena la diferencia en la posición X entre eventos, para calcular el desplazamiento del slider

    const showHideIcons = () => { //Función para mostrar u ocultar los botones de navegación en función de la posición del slider
        const scrollWidth = slider.scrollWidth - slider.clientWidth;
        sliderButtons[0].style.display = slider.scrollLeft === 0 ? 'none' : 'block';
        sliderButtons[1].style.display = slider.scrollLeft === scrollWidth ? 'none' : 'block';
    };

    sliderButtons.forEach(button => {
        button.addEventListener('click', () => {//Cuando se hace clic en un botón de navegación...
            const firstImgWidth = slider.querySelectorAll('img')[0].clientWidth + 14;//...se calcula el ancho de la primera imagen y... 
            slider.scrollLeft += button.classList.contains('left') ? -firstImgWidth : firstImgWidth; //...se desplaza el slider hacia la izquierda o la derecha según el botón que se haya presionado
            setTimeout(() => showHideIcons(), 60);//temporizador para asegurarse de que los botones se muestren u oculten correctamente
        });
    });

    const autoSlide = () => {//se llama cuando se suelta el arrastre del slider y realiza un desplazamiento automático en función de la dirección del desplazamiento anterior
        const scrollWidth = slider.scrollWidth - slider.clientWidth;
        if (slider.scrollLeft - scrollWidth > -1 || slider.scrollLeft <= 0) return;
        positionDiff = Math.abs(positionDiff);
        const firstImgWidth = slider.querySelectorAll('img')[0].clientWidth + 14;
        const valDifference = firstImgWidth - positionDiff;

        if (slider.scrollLeft > prevScrollLeft) {
            return (slider.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff);
        }

        slider.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    };
            //Se definen las funciones para gestionar el arrastre del slider
    const dragStart = e => {
        isDragStart = true;
        prevPageX = e.pageX || e.touches[0].pageX;
        prevScrollLeft = slider.scrollLeft;
    };

    const dragging = e => {
        if (!isDragStart) return;
        e.preventDefault();
        isDragging = true;
        slider.classList.add('dragging');
        positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
        slider.scrollLeft = prevScrollLeft - positionDiff;
        showHideIcons();
    };

    const dragStop = () => {
        isDragStart = false;
        slider.classList.remove('dragging');

        if (!isDragging) return;
        isDragging = false;
        autoSlide();
    };
            //Aquí se establecen los eventos de arrastre y clic en el slider y en otros elementos relevantes
    slider.addEventListener('mousedown', dragStart);
    slider.addEventListener('touchstart', dragStart);
    document.addEventListener('mousemove', dragging);
    slider.addEventListener('touchmove', dragging);
    document.addEventListener('mouseup', dragStop);
    slider.addEventListener('touchend', dragStop);
});