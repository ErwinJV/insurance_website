import Alpine from "alpinejs";
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper and modules styles

// init Swiper:
new Swiper(".swiper", {
  // configure Swiper to use modules
  modules: [Navigation, Pagination],
  direction: "horizontal",
  loop: true,

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

import { padFooter } from "./frontend";

//@ts-ignore
window.Alpine = Alpine;

Alpine.data("header", () => ({
  open: false,
  services: false,
}));

Alpine.start();

padFooter();

console.log("TS BY VITE FROM WORDPRESS");
