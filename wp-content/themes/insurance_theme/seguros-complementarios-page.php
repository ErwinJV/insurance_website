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


  <!-- Sección Hero - Seguros Complementarios -->

   <!-- Hero Section con imagen de fondo -->
    <section class="relative bg-[url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center py-16 md:py-20">
        <!-- Overlay para mejorar la legibilidad del texto -->
        <div class="absolute inset-0 bg-[#133251] bg-opacity-80"></div>

        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">Seguros Complementarios de Visión y Dental</h1>
                <p class="text-xl mb-8 text-white">Protección adicional para tu salud visual y dental que complementa tu seguro médico principal. Cuida tu sonrisa y tu visión con los mejores profesionales.</p>
                <a href="#contacto" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:translate-x-2">
                    Contactar ahora
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Elementos decorativos -->
            <!-- <div class="absolute bottom-0 left-0 w-32 h-32 bg-orange-500 opacity-20 rounded-full -translate-x-12 translate-y-12 hidden md:block"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-orange-500 opacity-20 rounded-full translate-x-12 -translate-y-12 hidden md:block"></div> -->

            <!-- Iconos temáticos -->
            <div class="absolute left-10 top-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-tooth text-white text-6xl"></i>
            </div>
            <div class="absolute right-10 bottom-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-eye text-white text-6xl"></i>
            </div>
        </div>
    </section>

    <!-- Sección de Ventajas -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#133251] mb-12">Ventajas de Nuestros Seguros Complementarios</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-dollar-sign text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Ahorro Significativo</h3>
                        <p class="text-gray-600">Reduce hasta un 60% los costos de tus lentes, exámenes de la vista y procedimientos dentales.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-network-wired text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Amplia Red de Profesionales</h3>
                        <p class="text-gray-600">Accede a una extensa red de oftalmólogos, optometristas y dentistas de primer nivel.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-calendar-check text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Sin Tiempos de Espera</h3>
                        <p class="text-gray-600">Cobertura inmediata sin períodos de espera prolongados para la mayoría de los servicios.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-user-friends text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Cobertura Familiar</h3>
                        <p class="text-gray-600">Protección extensiva para toda la familia con precios especiales para grupos.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-teeth text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Limpiezas y Chequeos Gratuitos</h3>
                        <p class="text-gray-600">Incluye limpiezas dentales semestrales y chequeos de visión anuales sin costo adicional.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Protección Integral</h3>
                        <p class="text-gray-600">Cobertura que incluye desde procedimientos preventivos hasta tratamientos especializados.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Contactar
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


       <!-- Sección de Consejos para Seguros Complementarios -->
    <section class="py-16 md:py-24 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)">
        <div class="max-w-6xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#133251] mb-6">
                    Consejos para Elegir Seguros Complementarios de Visión y Dental
                </h2>
                <div class="w-24 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-lg md:text-xl text-[#133251]/90 max-w-3xl mx-auto">
                    Protege tu salud visual y dental con estos consejos para seleccionar las coberturas complementarias ideales para tus necesidades.
                </p>
            </div>

            <!-- Tarjetas de consejos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Consejo 1 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-eye text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Evalúa Tus Necesidades Visuales y Dentales</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Analiza tus necesidades actuales y futuras de cuidado visual y dental, considerando exámenes regulares,
                            lentes correctivos, procedimientos ortodonticos y cualquier condición existente.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Identifica la frecuencia de tus exámenes visuales y dentales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Considera si necesitas lentes, ortodoncia o otros tratamientos</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Evalúa tu historial familiar de problemas visuales o dentales</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 2 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-teeth text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Compara Coberturas y Límites</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Examina detenidamente qué servicios están cubiertos, los límites anuales, los copagos
                            y los períodos de espera para tratamientos específicos en cada plan.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica la cobertura para lentes, monturas y lentes de contacto</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Compara los límites para limpiezas, empastes y coronas dentales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Revisa las restricciones para procedimientos especializados</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 3 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-network-wired text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Verifica las Redes de Proveedores</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Confirma que tus oftalmólogos, optometristas y dentistas preferidos estén dentro de la red
                            de proveedores del plan para maximizar tus beneficios y minimizar costos.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Consulta el directorio de proveedores antes de decidir</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica la facilidad para cambiar de especialista si es necesario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Considera la conveniencia geográfica de los proveedores en la red</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="mt-16 bg-[#133251] rounded-xl p-8 card-shadow">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/4 mb-6 md:mb-0 flex justify-center">
                        <div class="w-24 h-24 rounded-full bg-orange-500 flex items-center justify-center">
                            <i class="fas fa-smile text-4xl text-white"></i>
                        </div>
                    </div>
                    <div class="md:w-3/4">
                        <h3 class="text-2xl font-bold text-white mb-4">Ventajas de los Seguros Complementarios de Visión y Dental</h3>
                        <p class="text-orange-100 mb-4">
                            Contar con coberturas especializadas para tu salud visual y dental ofrece importantes beneficios:
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-orange-100">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Acceso a exámenes preventivos regulares sin alto costo</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Ahorros significativos en lentes, monturas y tratamientos dentales</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Detección temprana de problemas visuales y dentales</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Protección financiera ante procedimientos costosos</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Llamada a la acción -->
            <div class="mt-16 text-center">
                <h3 class="text-2xl font-bold text-[#133251] mb-6">¿Necesitas Asesoría en Seguros Complementarios?</h3>
                <p class="text-[#133251]/90 mb-8 max-w-2xl mx-auto">
                    Como agente especializado en seguros de visión y dental, puedo ayudarte a encontrar las coberturas complementarias ideales para proteger tu salud visual y dental.
                </p>
                <a href="#contacto" class="inline-block px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition duration-300 shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Agendar consulta gratuita
                </a>
                <div class="mt-6 flex items-center justify-center text-[#133251]">
                    <i class="fas fa-shield-alt mr-2"></i>
                    <span>Especialista en seguros complementarios - NPN# 12345678</span>
                </div>
            </div>
        </div>
    </section>


<?php require INSURANCE_VIEWS_PATH . "/testimonials-section.php"?>

 < divclass  = "h-10" >  <  / div >

<?php require INSURANCE_VIEWS_PATH . "/contact-form-section.php"?>
<div class="h-10"></div>

<?php get_footer(); ?>

