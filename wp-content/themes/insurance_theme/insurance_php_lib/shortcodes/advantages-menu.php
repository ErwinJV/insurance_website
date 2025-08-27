<?php

    function advantages_section_shortcode($atts)
    {
        // Obtener las ventajas y configuración general desde la base de datos
        $advantages       = get_option('advantages_section_data', []);
        $general_settings = get_option('advantages_section_general', []);

        // Valores por defecto
        $defaults = [
            'section_title'       => 'Por qué elegir a <span class="text-orange-500">nuestros servicios</span> como tu <span class="highlight">solución ideal</span>',
            'section_description' => 'Más de 15 años de experiencia ofreciendo soluciones personalizadas que se adaptan a las necesidades y presupuesto de cada cliente.',
            'agent_quote'         => 'Nuestro compromiso es brindarte tranquilidad con soluciones que realmente protegen lo que más valoras.',
            'agent_name'          => 'Equipo de Expertos',
            'agent_title'         => 'Profesionales Certificados',
            'button_text'         => 'Solicitar Consulta',
            'years_experience'    => '15+',
            'families_protected'  => '2K+',
            'satisfaction_rate'   => '98%',
            'support_available'   => '24/7',
            'agent_image'         => '',
        ];
        $general_settings = wp_parse_args($general_settings, $defaults);

        // Iniciar buffer de salida
        ob_start();

        if (! empty($advantages)):
    ?>
    <section class="w-full px-4 py-12 bg-[url(/src/img/advantages-section-bg.webp)] bg-cover bg-fixed text-[#133251]">
        <div class="container mx-auto">
            <!-- Contenedor de dos columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Columna izquierda: Titulo, eslogan y botón -->
                <div class="lg:pr-8">
                    <span class="text-orange-500 font-bold text-lg tracking-wider mb-4 inline-block">
                        <i class="fas fa-star mr-2"></i>VALOR AÑADIDO
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                        <?php echo $general_settings['section_title']; ?>
                    </h2>
                    <p class="text-xl mb-8 leading-relaxed">
                        <?php echo esc_html($general_settings['section_description']); ?>
                    </p>

                    <div class="bg-orange-50 border-l-4 border-orange-500 rounded-lg p-6 mb-10">
                        <p class="text-gray-700 italic mb-3">
                            <i class="fas fa-quote-left text-orange-300 mr-2"></i>
                            <?php echo esc_html($general_settings['agent_quote']); ?>
                        </p>
                        <div class="flex items-center">
                            <?php if (! empty($general_settings['agent_image'])): ?>
                                <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center mr-3 overflow-hidden">
                                    <img src="<?php echo esc_url($general_settings['agent_image']); ?>" alt="<?php echo esc_attr($general_settings['agent_name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-orange-600"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <p class="font-semibold"><?php echo esc_html($general_settings['agent_name']); ?></p>
                                <p class="text-sm text-gray-600"><?php echo esc_html($general_settings['agent_title']); ?></p>
                            </div>
                        </div>
                    </div>

                    <button class="contact-btn bg-orange-500 hover:bg-orange-600 text-white font-bold py-5 px-10 rounded-full text-lg w-full lg:w-auto">
                        <i class="fas fa-calendar-check mr-3"></i><?php echo esc_html($general_settings['button_text']); ?>
                    </button>
                </div>

                <!-- Columna derecha: Tarjetas de beneficios -->
                <div class="space-y-8">
                    <!-- Loop de beneficios -->
                    <?php foreach ($advantages as $advantage): ?>
                        <div class="benefit-card">
                            <div class="flex flex-col sm:flex-row p-7">
                                <div class="benefit-icon flex items-center justify-center mr-7 mb-4 sm:mb-0">
                                    <i class="<?php echo esc_attr($advantage['icon']); ?> text-3xl text-orange-500"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold mb-3 text-gray-800"><?php echo esc_html($advantage['title']); ?></h3>
                                    <p class="text-gray-600">
                                        <?php echo esc_html($advantage['description']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Estadísticas de confianza -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20 max-w-4xl mx-auto">
                <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                    <div class="text-4xl font-bold text-orange-500 mb-2"><?php echo esc_html($general_settings['years_experience']); ?></div>
                    <div>Años de Experiencia</div>
                </div>
                <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                    <div class="text-4xl font-bold text-orange-500 mb-2"><?php echo esc_html($general_settings['families_protected']); ?></div>
                    <div>Familias Protegidas</div>
                </div>
                <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                    <div class="text-4xl font-bold text-orange-500 mb-2"><?php echo esc_html($general_settings['satisfaction_rate']); ?></div>
                    <div>Satisfacción Clientes</div>
                </div>
                <div class="bg-white p-6 rounded-xl text-center shadow-sm">
                    <div class="text-4xl font-bold text-orange-500 mb-2"><?php echo esc_html($general_settings['support_available']); ?></div>
                    <div>Soporte Disponible</div>
                </div>
            </div>
        </div>
    </section>
    <?php
        else:
                echo '<p>No se han configurado ventajas aún. Por favor, configure las ventajas en el panel de administración.</p>';
            endif;

            // Devolver el contenido del buffer
            return ob_get_clean();
        }
    add_shortcode('seccion_ventajas', 'advantages_section_shortcode');
