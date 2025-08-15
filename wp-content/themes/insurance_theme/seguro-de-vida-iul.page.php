<?php
    /**
     * Template Name: Seguro de vida IUL
     */
?>
<?php

    use insurance_php_lib\classes\Assets;

    $assets = new Assets();

    get_header();

?>
<div id="pad-nav"></div>
 <!-- Sección Hero - Seguro de Vida IUL -->
    <section id="iul" class="hero-section flex items-center py-16 px-4 sm:px-6 lg:px-8 bg-gray-50 service-section">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative">
            <!-- Imagen -->
            <div class="hero-overlay lg:order-1">
                <div class="w-full h-full rounded-tr-[100px] rounded-br-[100px] overflow-hidden shadow-2xl hero-image-container">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=900&q=80"
                         alt="Seguro de vida IUL"
                         class="hero-image">
                </div>
            </div>

            <!-- Contenido -->
            <div class="hero-content lg:order-2">
                <div class="bg-[#133251] text-white text-sm font-bold py-1 px-4 rounded-full inline-block mb-6">
                    Inversión y Protección
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Seguro de Vida <span class="highlight-text">IUL</span><br>para tu futuro
                </h1>
                <p class="text-xl text-white mb-10 max-w-2xl">
                    Combina protección de vida con crecimiento de valor en efectivo. Nuestras pólizas de seguro de vida universal indexado (IUL) te ofrecen flexibilidad y potencial de crecimiento vinculado a índices del mercado.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="#contacto" class="bg-orange-500 hover:bg-[#133251] text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-chart-line mr-3"></i>
                        Explorar beneficios
                    </a>
                    <a href="#" class="bg-white border-2 border-orange-500 text-orange-500 hover:bg-[#133251] hover:border-[#133251] hover:text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                        <i class="fas fa-book mr-3"></i>
                        Guía informativa
                    </a>
                </div>

                <!-- Beneficios -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-arrow-up text-orange-500"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-[#133251]">Crecimiento potencial</h3>
                            <p class="text-gray-600">Vinculado a índices de mercado con protección de capital</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-university text-orange-500"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-[#133251]">Flexibilidad financiera</h3>
                            <p class="text-gray-600">Accede al valor en efectivo para necesidades futuras</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Elemento decorativo -->
        <div class="absolute bottom-20 right-10 w-20 h-20 bg-orange-500 rounded-full opacity-10"></div>
        <div class="absolute top-1/4 left-10 w-14 h-14 bg-[#133251] rounded-full opacity-10"></div>
    </section>


<?php get_footer(); ?>