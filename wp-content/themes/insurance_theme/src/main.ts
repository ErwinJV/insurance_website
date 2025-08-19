import Alpine from "alpinejs";
import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import { padFooter } from "./frontend";

Swiper.use([Autoplay, Navigation]);
// import Swiper and modules styles

// init Swiper:
new Swiper(".swiper", {
  // configure Swiper to use modules
  autoplay: true,

  modules: [Navigation, Pagination],
  direction: "horizontal",
  loop: true,
  spaceBetween: 10,
  slidesPerView: "auto", // Para slides de ancho variable
  freeMode: true, // Útil cuando hay overflow
  observer: true, // Detecta cambios en el DOM
  observeParents: true, // Observa contenedores padres
  resizeObserver: true, // Para responsive

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  effect: "fade",

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

const testimonialsSwiper = new Swiper(".testimonials-swiper", {
  loop: true,
  slidesPerView: 1,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (_, className) {
      return '<span class="' + className + '"></span>';
    },
  },
  autoplay: {
    disableOnInteraction: false,
  },
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
});

// Controlar el slider con el botón de flecha derecha
document.querySelector(".next-button")?.addEventListener("click", function () {
  testimonialsSwiper.slideNext();
});

// const highlightText = document.querySelector(".highlight-text");
// setTimeout(() => {
//   highlightText.style.opacity = "1";
//   highlightText.style.transform = "translateY(0)";
// }, 300);

const padNav = document.getElementById("pad-nav");
const mainNav = document.getElementById("insurance-main-nav");
const heroPage = document.getElementById("hero-page");

if (padNav && mainNav) {
  const heightNav = mainNav.offsetHeight;
  padNav.style.height = `${heightNav}px`;
}

if (heroPage && mainNav) {
  const heightNav = mainNav.offsetHeight;
  console.log({ heroPage });
  heroPage.style.height = `calc(100vh - ${heightNav}px)`;
}

//@ts-ignore
window.Alpine = Alpine;

Alpine.data("header", () => ({
  open: false,
  services: false,
}));

Alpine.start();

padFooter();

console.log("TS BY VITE FROM WORDPRESS");
