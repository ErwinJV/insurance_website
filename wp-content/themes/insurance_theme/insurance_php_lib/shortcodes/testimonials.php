<?php
    // Shortcode para mostrar testimonios
    function testimonios_shortcode($atts)
    {
        global $wpdb;
        $tabla_testimonios = $wpdb->prefix . 'testimonios';

        // Obtener testimonios de la base de datos
        $testimonios = $wpdb->get_results("SELECT * FROM $tabla_testimonios ORDER BY orden ASC, fecha_creacion DESC");

        if (empty($testimonios)) {
            return '<p>No hay testimonios para mostrar.</p>';
        }

        ob_start();
    ?>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white bg-[url(/src/img/testimonials-section-bg.webp)] bg-cover bg-center">
        <div class="max-w-7xl mx-auto">
            <!-- Título y descripción -->
            <div class="text-center mb-16">
                <div class="mb-2" id="testimonios">
                    <span class="section-subtitle text-[#133251] font-bold text-lg tracking-wider">
                        TESTIMONIOS
                    </span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-[#133251] mb-4">
                    Lo que dicen nuestros <span class="text-orange-500"> clientes</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Columna izquierda: Testimonios -->
                <div class="order-2 lg:order-2">
                    <!-- Contenedor relativo para el botón de flecha -->
                    <div class="relative rounded">
                        <!-- Carrusel de testimonios -->
                        <div class="swiper testimonials-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($testimonios as $testimonio): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-card bg-white p-8 rounded-xl relative border-l-4 border-orange-500 h-[236px]">
                                            <i class="fas fa-quote-right quote-icon"></i>
                                            <div class="flex items-start mb-6">
                                                <img src="<?php echo esc_url($testimonio->imagen); ?>"
                                                     alt="<?php echo esc_attr($testimonio->nombre); ?>"
                                                     class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-lg">
                                                <div class="ml-5">
                                                    <h3 class="font-bold text-xl text-[#133251]"><?php echo esc_html($testimonio->nombre); ?></h3>
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
                                                "<?php echo esc_html($testimonio->texto); ?>"
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Botón de flecha derecha personalizado -->
                        <div class="next-button">
                            <i class="fas fa-chevron-right text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha: Información del agente -->
                <div class="order-1 lg:order-1 flex flex-col items-center lg:items-end">
                    <div class="relative bg-[#133251]">
                        <img src="<?php echo INSURANCE_RESOURCES_URI . "/img/elvis-jimenez.png"; ?>"
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

    <?php
        return ob_get_clean();
        }
        add_shortcode('testimonios', 'testimonios_shortcode');

        // Agregar estilos para el administrador
        function testimonios_admin_styles()
        {
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_media();
            wp_enqueue_script('testimonios-admin', '', ['jquery', 'wp-color-picker'], '', true);
        }
    add_action('admin_enqueue_scripts', 'testimonios_admin_styles');
