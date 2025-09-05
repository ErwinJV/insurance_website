<?php
    $testimonials = [
        [
            'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&h=100&q=80',
            'name'  => 'María Rodríguez',
            'text'  => 'Elvis me ayudó a encontrar la mejor póliza para mi negocio. Su conocimiento y atención personalizada hicieron toda la diferencia. ¡Altamente recomendado!',
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&h=100&q=80',
            'name'  => 'Carlos Martínez',
            'text'  => 'Después de años con otro agente, cambiarme a Elvis fue la mejor decisión. Explica todo con claridad y siempre está disponible para resolver dudas.',
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&h=100&q=80',
            'name'  => 'Laura González',
            'text'  => 'Cuando tuve un accidente automovilístico, Elvis manejó todo el proceso con tanta eficiencia que me alivió mucho estrés. Es un profesional excepcional.',
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&h=100&q=80',
            'name'  => 'Roberto Sánchez',
            'text'  => 'La asesoría de Elvis me ayudó a ahorrar un 30% en mis seguros sin perder cobertura. Su conocimiento del mercado es impresionante.',
        ],
    ];

?>

   <!-- Sección de testimonios -->


    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white bg-[url(/src/img/testimonials-section-bg.webp)] bg-cover bg-center">
        <div class="max-w-7xl mx-auto">
            <!-- Título y descripción -->
            <div class="text-center mb-16">

             <div class="mb-2" id="testimonios">
                <span class="section-subtitle text-[#133251]  font-bold text-lg tracking-wider">
                    TESTIMONIOS
                </span>
            </div>
                <h2 class="text-4xl md:text-5xl font-bold text-[#133251] mb-4">
                    Lo que dicen nuestros <span class="text-orange-500"> clientes</span>
                </h2>
                <!-- <div class="w-24 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Más de 15 años de experiencia ayudando a familias y empresas a proteger lo que más valoran
                </p> -->
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Columna izquierda: Testimonios -->
                <div class="order-2 lg:order-1">
                    <!-- Contenedor relativo para el botón de flecha -->
                    <div class="relative rounded
">
                        <!-- Carrusel de testimonios -->
                        <div class="swiper testimonials-swiper">
                            <div class="swiper-wrapper  ">
                                <!-- Testimonio 1 -->

                              <?php foreach ($testimonials as $testimonial): ?>

                                  <div class="swiper-slide ">
                                    <div class="testimonial-card bg-white p-8 rounded-xl relative border-l-4 border-orange-500 h-[236px]">
                                        <i class="fas fa-quote-right quote-icon"></i>
                                        <div class="flex items-start mb-6">
                                            <img src="<?php echo $testimonial['image']; ?>"
                                                 alt="Cliente satisfecho"
                                                 class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-lg">
                                            <div class="ml-5">
                                                <h3 class="font-bold text-xl text-[#133251]"><?php echo $testimonial["name"]; ?></h3>
                                                <div class="flex mt-1">
                                                    <i class="fas fa-star text-orange-500"></i>
                                                    <i class="fas fa-star text-orange-500"></i>
                                                    <i class="fas fa-star text-orange-500"></i>
                                                    <i class="fas fa-star text-orange-500"></i>
                                                    <i class="fas fa-star text-orange-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-lg italic">
                                            "<?php echo $testimonial['text']; ?>"
                                        </p>
                                    </div>
                                </div>
                              <?php endforeach; ?>


                            </div>

                            <!-- Paginación -->
                            <!-- <div class="flex justify-center mt-10 space-x-3">
                                <div class="swiper-pagination"></div>
                            </div> -->
                        </div>

                        <!-- Botón de flecha derecha personalizado -->
                        <div class="next-button">
                            <i class="fas fa-chevron-right text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha: Información del agente -->
                <div class="order-1 lg:order-2 flex flex-col items-center lg:items-end">


                    <div class="relative bg-[#133251]">
                        <img src="<?php echo INSURANCE_RESOURCES_URI . "/img/elvis-jimenez.png" ?>"
                             alt="Elvis Jiménez - Agente de Seguros"
                             class="agent-photo rounded-2xl w-full max-w-md object-cover h-96 lg:h-[500px]">

                        <div class="absolute -bottom-6 -right-6 bg-orange-500 text-white rounded-xl shadow-xl py-4 px-6">
                            <h4 class="font-bold text-xl">Elvis Jiménez</h4>
                            <p class="font-medium">Agente Certificado</p>
                        </div>
                    </div>
                     <div class="h-10"></div>
                      <div class="mb-10 text-center lg:text-right max-w-lg">
                        <h3 class="text-2xl md:text-3xl font-bold text-[#133251] mb-4">
                            Protegiendo lo que más valoras
                        </h3>
                        <p class="text-[#133251] mb-5 text-xl ">
                            Como agente de seguros certificado con más de 15 años de experiencia, me especializo en crear soluciones personalizadas que protejan lo que más valoras: tu familia, tu patrimonio y tu tranquilidad.
                        </p>
                        <p class="text-[#133251] text-xl ">
                            Mi enfoque se basa en entender tus necesidades específicas para ofrecerte la cobertura perfecta, con el mejor equilibrio entre protección y costo.
                        </p>

                        <div class="mt-4 flex justify-center lg:justify-end">
                            <a href="#contacto" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center">
                                Contactar ahora
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
