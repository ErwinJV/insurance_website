<?php
    /**
     * Template Name: Seguros Complementarios
     */
?>

<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();
?>

<div id="pad-nav"></div>
  <!-- Sección Hero - Seguros Complementarios -->
    <section id="complementary" class="hero-section flex items-center py-16 px-4 sm:px-6 lg:px-8 service-section">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative">
            <!-- Contenido -->
            <div class="hero-content">
                <div class="bg-orange-500 text-white text-sm font-bold py-1 px-4 rounded-full inline-block mb-6">
                    Salud Integral
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#133251] mb-6 leading-tight">
                    Seguros <span class="highlight-text">Complementarios</span><br>para tu bienestar
                </h1>
                <p class="text-xl text-gray-600 mb-10 max-w-2xl">
                    Cobertura especializada para visión y dental que complementa tu seguro médico principal. Disfruta de beneficios adicionales para mantener tu salud visual y bucal en óptimas condiciones.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#contacto" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-eye mr-3"></i>
                        Cobertura visual
                    </a>
                    <a href="#contacto" class="bg-orange-500 hover:bg-[#133251] text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-tooth mr-3"></i>
                        Cobertura dental
                    </a>
                </div>

                <!-- Beneficios -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-glasses text-orange-500"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-[#133251]">Visión completa</h3>
                            <p class="text-gray-600">Exámenes anuales, lentes y descuentos en cirugías</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-smile text-orange-500"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-[#133251]">Cuidado dental</h3>
                            <p class="text-gray-600">Limpiezas, tratamientos y ortodoncia con cobertura</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Imagen -->
            <div class="hero-overlay">
                <div class="w-full h-full rounded-tl-[100px] rounded-bl-[100px] overflow-hidden shadow-2xl hero-image-container">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=900&q=80"
                         alt="Seguros complementarios"
                         class="hero-image">
                </div>
            </div>
        </div>

        <!-- Elemento decorativo -->
        <div class="absolute top-10 right-10 w-20 h-20 bg-orange-500 rounded-full opacity-10"></div>
        <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-[#133251] rounded-full opacity-10"></div>
    </section>


<div class="h-10"></div>

<?php get_footer(); ?>

