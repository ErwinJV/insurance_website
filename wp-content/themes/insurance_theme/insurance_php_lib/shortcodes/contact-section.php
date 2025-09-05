<?php
    add_shortcode('seccion_contacto', 'mostrar_seccion_contacto');

    function mostrar_seccion_contacto()
    {
        // Obtener valores guardados
        $shortcode          = get_option('contacto_shortcode', '');
        $titulo             = get_option('contacto_titulo', 'Protege tu futuro con <span class="text-orange-500">asesoría experta</span>');
        $subtitulo          = get_option('contacto_subtitulo', 'Completa el formulario y uno de nuestros especialistas en seguros te contactará para brindarte soluciones personalizadas que se adapten a tus necesidades.');
        $porque_titulo      = get_option('contacto_porque_titulo', '¿Por qué contactar con Elvis Jimenez Seguros?');
        $porque_descripcion = get_option('contacto_porque_descripcion', 'Con más de 15 años de experiencia protegiendo a familias hispanas, te ofrecemos soluciones de seguros que combinan cobertura completa, precios accesibles y atención personalizada. Nuestros expertos te guiarán para tomar la mejor decisión.');
        $cita               = get_option('contacto_cita', 'Mi compromiso es entender tus necesidades y ofrecerte soluciones de seguros que brinden tranquilidad y seguridad financiera a tu familia.');
        $horario            = get_option('contacto_horario', "Lunes a Viernes: 9am - 6pm\nSábados: 10am - 2pm");
        $direccion          = get_option('contacto_direccion', "123 Calle Seguridad\nMiami, FL 33101");
        $imagen_agente      = get_option('contacto_imagen_agente', '');
        
        // Obtener enlaces de redes sociales
        $whatsapp = get_option('speed_dial_whatsapp', '');
        $instagram = get_option('speed_dial_instagram', '');
        $facebook = get_option('speed_dial_facebook', '');
        $telefono = get_option('speed_dial_telefono', '');
        $email = get_option('speed_dial_email', '');

        // Convertir saltos de línea en <p> o <br>
        $horario   = nl2br(esc_html($horario));
        $direccion = nl2br(esc_html($direccion));

        $shortcode = str_replace('\\', '', $shortcode);

        ob_start();
    ?>
    <!-- Sección de contacto -->
    <section class="contact-section pb-4" id="contacto" >

        <div class="contact-content">
            <!-- Titulo de la sección -->
            <div class="text-center mb-16">
                <span class="text-orange-500 font-bold text-lg tracking-wider mb-4 inline-block">
                    <i class="fas fa-comments mr-2"></i>CONTACTO
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 leading-tight">
                    <?php echo stripslashes($titulo); ?>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    <?php echo stripslashes($subtitulo); ?>
                </p>
            </div>

            <!-- Contenedor de dos columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14">
                <!-- Columna izquierda: Información -->
                <div class="lg:pr-8">
                    <div class="mb-10">
                        <h3 class="text-3xl font-bold mb-6 text-gray-800">
                            <?php echo stripslashes($porque_titulo); ?>
                        </h3>
                        <p class="text-gray-600 mb-8 text-lg">
                            <?php echo stripslashes($porque_descripcion); ?>
                        </p>

                        <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                            <p class="text-orange-800 italic mb-4">
                                <i class="fas fa-quote-left text-orange-300 mr-2 text-xl"></i>
                                <?php echo stripslashes($cita); ?>
                            </p>
                            <div class="flex items-center">
                                <?php if ($imagen_agente): ?>
                                    <div class="w-12 h-12 rounded-full bg-orange-200 flex items-center justify-center mr-4 overflow-hidden">
                                        <img src="<?php echo esc_url($imagen_agente); ?>" alt="Elvis Jimenez" class="w-full h-full object-cover">
                                    </div>
                                <?php else: ?>
                                    <div class="w-12 h-12 rounded-full bg-orange-200 flex items-center justify-center mr-4">
                                        <i class="fas fa-user text-orange-600"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <p class="font-bold text-gray-800">Elvis Jimenez</p>
                                    <p class="text-sm text-gray-600">Agente de Seguros Certificado</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjetas de información -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="contact-card bg-white rounded-xl p-6 shadow-sm">
                            <div class="contact-icon">
                                <i class="fas fa-clock text-2xl text-orange-500"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-800 mt-4">Horario de Atención</h3>
                            <p class="text-gray-600"><?php echo $horario; ?></p>
                        </div>

                        <div class="contact-card bg-white rounded-xl p-6 shadow-sm">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt text-2xl text-orange-500"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-800 mt-4">Ubicación</h3>
                            <p class="text-gray-600"><?php echo $direccion; ?></p>
                        </div>
                    </div>
                    
                    <!-- Redes Sociales (solo Facebook e Instagram) -->
                    <div class="mt-10">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Síguenos en redes sociales</h3>
                        <div class="flex flex-wrap gap-3">
                            <?php if ($facebook): ?>
                                <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="flex items-center justify-center w-10 h-10 text-white bg-blue-600 rounded-full hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($instagram): ?>
                                <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="flex items-center justify-center w-10 h-10 text-white bg-pink-600 rounded-full hover:bg-pink-700 transition-colors duration-200">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($email): ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-center justify-center w-10 h-10 text-white bg-red-500 rounded-full hover:bg-red-600 transition-colors duration-200">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha: Formulario -->
                <div class="lg:pl-8">
                    <!-- Contacto directo (WhatsApp y Teléfono) - Arriba del formulario -->
                    <div class="mb-8 p-6 bg-white rounded-xl shadow-sm">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">¿Prefieres contactarnos directamente?</h3>
                        <p class="text-gray-600 mb-4">Estamos disponibles para atenderte de inmediato</p>
                        
                        <div class="flex flex-wrap gap-4">
                            <?php if ($whatsapp): ?>
                                <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" class="flex items-center px-4 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200">
                                    <i class="fab fa-whatsapp text-xl mr-2"></i>
                                    <span>Chatear por WhatsApp</span>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($telefono): ?>
                                <a href="tel:<?php echo esc_attr($telefono); ?>" class="flex items-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fas fa-phone text-xl mr-2"></i>
                                    <span>Llamar ahora</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Formulario de contacto -->
                    <div class="p-6 bg-white rounded-xl shadow-sm">
                        <?php echo do_shortcode($shortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    
        <?php require INSURANCE_COMPONENTS_PATH . "/aliados.php"; ?>
    </section>

    <?php
        return ob_get_clean();
    }