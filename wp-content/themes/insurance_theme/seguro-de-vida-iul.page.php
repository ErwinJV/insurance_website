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

 <!-- Sección Hero - Seguro de Vida IUL -->
   <!-- Hero Section con imagen de fondo -->
    <section class="relative bg-[url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1611&q=80')] bg-cover bg-center py-16 md:py-20">
        <!-- Overlay para mejorar la legibilidad del texto -->
        <div class="absolute inset-0 bg-[#133251] bg-opacity-80"></div>

        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">Seguros de Vida Indexados Universal (IUL)</h1>
                <p class="text-xl mb-8 text-white">Protección para tu familia y oportunidad de crecimiento financiero con los Seguros de Vida Indexados Universal. Combina seguridad con potencial de crecimiento basado en índices bursátiles.</p>
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
                <i class="fas fa-chart-line text-white text-6xl"></i>
            </div>
            <div class="absolute right-10 bottom-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-shield-alt text-white text-6xl"></i>
            </div>
        </div>
    </section>

    <!-- Sección de Ventajas -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#133251] mb-12">Beneficios de los Seguros IUL</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Potencial de Crecimiento</h3>
                        <p class="text-gray-600">Posibilidad de crecimiento del valor en efectivo basado en el rendimiento de índices bursátiles, con protección contra pérdidas.</p>
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
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Protección Garantizada</h3>
                        <p class="text-gray-600">Protección de por vida para tus seres queridos con un beneficio por fallecimiento libre de impuestos.</p>
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
                            <i class="fas fa-taxi text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Ventajas Fiscales</h3>
                        <p class="text-gray-600">Crecimiento fiscalmente diferido y retiros libres de impuestos a través de préstamos contra el valor en efectivo.</p>
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
                            <i class="fas fa-university text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Flexibilidad de Primas</h3>
                        <p class="text-gray-600">Ajusta tus primas y beneficio por fallecimiento según cambien tus necesidades financieras.</p>
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
                            <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Acceso al Efectivo</h3>
                        <p class="text-gray-600">Accede al valor en efectivo para emergencias, oportunidades de inversión o complementar tu jubilación.</p>
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
                            <i class="fas fa-user-friends text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Protección Familiar</h3>
                        <p class="text-gray-600">Protección financiera para tu familia que puede extenderse a múltiples generaciones.</p>
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

    <!-- Sección de Información Adicional -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-[#133251] to-[#1e4a75] text-[#133251]">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-white">¿Cómo funcionan los Seguros IUL?</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-3">Primas Flexibles</h3>
                        <p class="text-center">Puedes ajustar el monto y la frecuencia de tus pagos según tu situación financiera, con opciones de pago limitado o de por vida.</p>
                    </div>

                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-balance-scale text-[#133251]
 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-center mb-3">Participación en el Mercado</h3>
                        <p class="text-center">Tu valor en efectivo puede crecer basado en índices bursátiles como el S&P 500, con protección contra pérdidas en mercados bajistas.</p>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <p class="text-xl mb-6 text-white">Los Seguros IUL ofrecen una combinación única de protección vitalicia y oportunidad de acumulación de valor en efectivo.</p>
                    <a href="#contacto" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:translate-x-2">
                        Obtener más información
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


        <!-- Sección de Consejos para Seguros IUL -->
    <section class="py-16 md:py-24 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)">
        <div class="max-w-6xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#133251] mb-6">
                    Consejos para Elegir un Seguro IUL (Universal Life Indexado)
                </h2>
                <div class="w-24 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-lg md:text-xl text-[#133251]/90 max-w-3xl mx-auto">
                    Combina protección vitalicia con potencial de crecimiento financiero mediante estos consejos para seleccionar el seguro IUL ideal.
                </p>
            </div>

            <!-- Tarjetas de consejos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Consejo 1 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Comprende el Potencial de Crecimiento</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Evalúa cómo el componente de inversión indexado funciona, con su potencial de crecimiento vinculado a índices bursátiles y protección contra pérdidas.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Analiza los índices disponibles y sus históricos</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Comprende los límites de participación y tasas techo</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Considera el piso de protección que evita pérdidas</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 2 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-coins text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Evalúa la Flexibilidad de Primas</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Examina las opciones de pago de primas, la capacidad de ajustarlas según tu situación financiera y cómo afectan al valor en efectivo y la cobertura.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica los pagos mínimos para mantener la póliza</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Analiza las opciones de primas adicionales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Comprende cómo las primas afectan el beneficio por fallecimiento</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 3 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-hand-holding-usd text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Planifica el Uso del Valor en Efectivo</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Considera cómo puedes utilizar el valor en efectivo acumulado para complementar tu jubilación, educación u otras necesidades financieras futuras.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Explora las opciones de préstamos contra tu póliza</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Comprende los retiros y sus implicaciones fiscales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Evalúa estrategias para maximizar el crecimiento a largo plazo</span>
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
                            <i class="fas fa-piggy-bank text-4xl text-white"></i>
                        </div>
                    </div>
                    <div class="md:w-3/4">
                        <h3 class="text-2xl font-bold text-white mb-4">Beneficios de un Seguro IUL Bien Planificado</h3>
                        <p class="text-orange-100 mb-4">
                            Un seguro Universal Life Indexado estratégicamente diseñado ofrece ventajas únicas:
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-orange-100">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Protección vitalicia con beneficio por fallecimiento libre de impuestos</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Crecimiento potencial del valor en efectivo vinculado a índices bursátiles</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Protección contra pérdidas en mercados bajistas</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Flexibilidad en primas y acceso al valor en efectivo</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Llamada a la acción -->
            <div class="mt-16 text-center">
                <h3 class="text-2xl font-bold text-[#133251] mb-6">¿Listo para Explorar un Seguro IUL?</h3>
                <p class="text-[#133251]/90 mb-8 max-w-2xl mx-auto">
                    Como especialista en seguros de vida con componente de inversión, puedo guiarte para determinar si un IUL es la estrategia adecuada para tus objetivos de protección y crecimiento financiero.
                </p>
                <a href="#contacto" class="inline-block px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition duration-300 shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Agendar consulta gratuita
                </a>
                <div class="mt-6 flex items-center justify-center text-[#133251]">
                    <i class="fas fa-shield-alt mr-2"></i>
                    <span>Especialista en segros IUL y estrategias financieras - NPN# 12345678</span>
                </div>
            </div>
        </div>
    </section>

<?php require INSURANCE_VIEWS_PATH . "/testimonials-section.php"?>
<div class="h-10"></div>

<?php require INSURANCE_VIEWS_PATH . "/contact-form-section.php"?>
<div class="h-10"></div>

<?php get_footer(); ?>