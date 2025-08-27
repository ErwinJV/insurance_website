<?php
    /**
     * Template Name: Seguro Obamacare
     * Description: A page template for displaying information about Seguro Obamacare.
     * @package InsuranceTheme
     */

get_header(); ?>


  <!-- Hero Section con imagen de fondo -->
    <section class="relative bg-[url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center py-16 md:py-20">
        <!-- Overlay para mejorar la legibilidad del texto -->
        <div class="absolute inset-0 bg-[#133251] bg-opacity-80"></div>

        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">Seguros de Salud Obamacare</h1>
                <p class="text-xl mb-8 text-white">Protección médica accesible para ti y tu familia. Los seguros de salud bajo la Ley de Cuidado de Salud a Bajo Precio ofrecen cobertura esencial con beneficios garantizados.</p>
                <a href="#contacto" class="inline-flex items-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:translate-x-2">
                    Obtener cobertura
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Elementos decorativos -->
            <!-- <div class="absolute bottom-0 left-0 w-32 h-32 bg-orange-500 opacity-20 rounded-full -translate-x-12 translate-y-12 hidden md:block"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-orange-500 opacity-20 rounded-full translate-x-12 -translate-y-12 hidden md:block"></div> -->

            <!-- Iconos temáticos -->
            <div class="absolute left-10 top-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-heartbeat text-white text-6xl"></i>
            </div>
            <div class="absolute right-10 bottom-1/4 opacity-50 hidden lg:block transition duration-300 ease-in-out hover:scale-110">
                <i class="fas fa-hospital-symbol text-white text-6xl"></i>
            </div>
        </div>
    </section>

    <!-- Sección de Ventajas -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#133251] mb-12">Beneficios de los Seguros de Salud Obamacare</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-ban text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Sin Exclusiones por Pre-existentes</h3>
                        <p class="text-gray-600">Las aseguradoras no pueden negar cobertura ni cobrar más por condiciones médicas preexistentes.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-baby text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Cobertura Preventiva Gratuita</h3>
                        <p class="text-gray-600">Chequeos, vacunas y exámenes preventivos sin costo adicional para el asegurado.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-coins text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Subsidios y Ayuda Económica</h3>
                        <p class="text-gray-600">Créditos fiscales y subsidios disponibles para quienes califiquen según sus ingresos.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-capsules text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Cobertura de Medicamentos</h3>
                        <p class="text-gray-600">Incluye medicamentos recetados con diferentes niveles de copagos según el plan.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-user-plus text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Cobertura para Jóvenes</h3>
                        <p class="text-gray-600">Los jóvenes pueden permanecer en el plan de sus padres hasta los 26 años.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                            <i class="fas fa-procedures text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#133251] mb-2">Servicios Esenciales</h3>
                        <p class="text-gray-600">Todos los planes deben cubrir 10 categorías de servicios de salud esenciales.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#contacto" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                            Más info
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Cómo Funciona -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-[#133251] to-[#1e4a75] text-[#133251]">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-white">¿Cómo funciona el Seguro de Salud Obamacare?</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <span class="text-[#133251] text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Evaluación</h3>
                    <p>Determina tu elegibilidad y calcula los posibles subsidios basados en tus ingresos y tamaño familiar.</p>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <span class="text-[#133251] text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Selección de Plan</h3>
                    <p>Elige entre los diferentes niveles de cobertura (Bronce, Plata, Oro, Platino) según tus necesidades y presupuesto.</p>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <span class="text-[#133251] text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Inscripción</h3>
                    <p>Completa tu inscripción durante el período abierto o en períodos especiales si calificas para alguno.</p>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <span class="text-[#133251] text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Uso de Cobertura</h3>
                    <p>Una vez inscrito, puedes comenzar a utilizar los servicios médicos según los términos de tu plan seleccionado.</p>
                </div>
            </div>

            <!-- <div class="mt-12 bg-white bg-opacity-15 backdrop-blur-sm rounded-xl p-6 md:p-8">
                <h3 class="text-2xl font-bold mb-4 text-center">Períodos de Inscripción</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-xl font-semibold mb-2 text-orange-300">Inscripción Abierta</h4>
                        <p>Generalmente ocurre entre el 1 de noviembre y el 15 de diciembre de cada año para cobertura que comienza el 1 de enero.</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2 text-orange-300">Período Especial</h4>
                        <p>Disponible para quienes experimentan eventos calificativos de vida como matrimonio, nacimiento de un hijo, pérdida de otro seguro, etc.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Sección de Consejos para Elegir un Buen Seguro -->
<!-- Sección de Consejos Obamacare -->
    <section class="py-16 md:py-24 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)">
        <div class="max-w-6xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#133251] mb-6">
                    Consejos para Elegir tu Plan de Seguros Obamacare
                </h2>
                <div class="w-24 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-lg md:text-xl text-[#133251]/90 max-w-3xl mx-auto">
                    Sigue estos pasos clave para seleccionar el plan de salud adecuado que se ajuste a tus necesidades y presupuesto.
                </p>
            </div>

            <!-- Tarjetas de consejos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Consejo 1 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-clipboard-list text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">1</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Evalúa Tus Necesidades de Salud</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Analiza tus necesidades médicas actuales y futuras, considerando medicamentos recetados,
                            médicos de preferencia y cualquier condición de salud existente.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Identifica los servicios médicos que utilizas regularmente</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica si tus médicos están en la red del plan</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Considera posibles cambios en tu salud durante el año</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 2 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-scale-balanced text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">2</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Compara Costos y Coberturas</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            No solo te fijes en la prima mensual. Evalúa todos los costos incluidos deducibles,
                            copagos y coseguros, así como los servicios cubiertos por cada plan.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Calcula el costo total anual estimado</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica los medicamentos cubiertos en el formulario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Compara los límites de gastos de bolsillo</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Consejo 3 -->
                <div class="bg-white rounded-xl overflow-hidden card-shadow">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fas fa-calendar-check text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500">3</span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]">Conoce los Períodos de Inscripción</h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            Infórmate sobre las fechas importantes del período de inscripción abierta y
                            los criterios para calificar para un período de inscripción especial.
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Marca las fechas límite de inscripción en tu calendario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Comprende los requisitos para períodos especiales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span>Verifica tu elegibilidad para subsidios</span>
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
                            <i class="fas fa-heart-circle-check text-4xl text-white"></i>
                        </div>
                    </div>
                    <div class="md:w-3/4">
                        <h3 class="text-2xl font-bold text-white mb-4">Beneficios de Elegir el Plan Correcto</h3>
                        <p class="text-orange-100 mb-4">
                            Seleccionar el plan de salud adecuado para tus necesidades ofrece importantes ventajas:
                        </p>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-orange-100">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Acceso a atención médica preventiva sin costo adicional</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Protección financiera ante emergencias médicas</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Tranquilidad al saber que cumples con el mandato de seguro médico</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-orange-300 mt-1 mr-2"></i>
                                <span>Posibilidad de calificar para subsidios que reduzcan tu prima</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Llamada a la acción -->
            <div class="mt-16 text-center">
                <h3 class="text-2xl font-bold text-[#133251] mb-6">¿Necesitas Ayuda para Elegir tu Plan?</h3>
                <p class="text-[#133251]/90 mb-8 max-w-2xl mx-auto">
                    Como agente certificado del Mercado de Seguros Médicos, puedo guiarte para encontrar el plan Obamacare perfecto para tus necesidades y presupuesto.
                </p>
                <a href="#contacto" class="inline-block px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition duration-300 shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Agendar consulta gratuita
                </a>
                <div class="mt-6 flex items-center justify-center text-[#133251]">
                    <i class="fas fa-shield-alt mr-2"></i>
                    <span>Agente certificado del Mercado de Seguros - NPN# 12345678</span>
                </div>
            </div>
        </div>
    </section>

<?php require INSURANCE_VIEWS_PATH . "/testimonials-section.php"?>
<div class="h-10"></div>

<?php require INSURANCE_VIEWS_PATH . "/contact-form-section.php"?>
<div class="h-10"></div>


<?php get_footer(); ?>
