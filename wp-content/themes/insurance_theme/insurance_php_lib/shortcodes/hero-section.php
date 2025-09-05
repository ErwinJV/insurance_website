<?php 
function hero_section_shortcode() {
    // Obtener valores guardados
    $titulo = get_option('hero_titulo', 'Protege a tu <span class="highlight-text">familia</span> con los mejores seguros');
    $subtitulo = get_option('hero_subtitulo', 'Más de 15 años ayudando a familias y empresas a proteger lo que más valoran. Con soluciones personalizadas y atención dedicada, Elvis Jiménez te ofrece la tranquilidad que mereces.');
    $boton1_texto = get_option('hero_boton1_texto', 'Solicitar asesoría');
    $boton1_enlace = get_option('hero_boton1_enlace', '#contacto');
    $boton2_texto = get_option('hero_boton2_texto', 'Ver servicios');
    $boton2_enlace = get_option('hero_boton2_enlace', '#servicios');
    $experiencia_texto = get_option('hero_experiencia_texto', '15 años');
    $experiencia_descripcion = get_option('hero_experiencia_descripcion', 'De experiencia');
    $imagen_fondo = get_option('hero_imagen_fondo', '');
    
    // Estilo de fondo
    $bg_style = $imagen_fondo ? "background-image: url('$imagen_fondo');" : "background-image: url(". INSURANCE_URI ."/src/img/insurance-hero-background.webp);";
    
    ob_start();
    ?>
    <main class="w-full bg-cover bg-center bg-no-repeat min-h-screen flex items-center py-12 md:py-16 lg:py-20" id="hero-page" style="<?php echo $bg_style; ?>">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center">
                <!-- Contenido principal - ahora con márgenes laterales en móviles -->
                <div class="hero-content bg-white/70 p-6 md:p-8 rounded-lg mx-4 md:mx-0 lg:mx-0 max-w-full lg:max-w-2xl">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-[#133251] mb-4 md:mb-6 leading-tight">
                        <?php echo stripslashes($titulo); ?>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-6 md:mb-8 max-w-full md:max-w-2xl">
                        <?php echo stripslashes($subtitulo); ?>
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 md:space-x-6">
                        <a href="<?php echo esc_url($boton1_enlace); ?>" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-3 px-6 md:py-4 md:px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center text-center text-sm md:text-base">
                            <?php echo esc_html($boton1_texto); ?>
                            <i class="fas fa-phone-alt ml-2 md:ml-3"></i>
                        </a>
                        <a href="<?php echo esc_url($boton2_enlace); ?>" class="bg-white border-2 border-[#133251] text-[#133251] hover:bg-orange-500 hover:border-orange-500 hover:text-white font-bold py-3 px-6 md:py-4 md:px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center text-center text-sm md:text-base">
                            <i class="fas fa-shield-alt mr-2 md:mr-3"></i>
                            <?php echo esc_html($boton2_texto); ?>
                        </a>
                    </div>
                    
                    <!-- Elemento decorativo -->
                    <div class="mt-10 md:mt-12 lg:mt-16 flex items-center justify-start">
                        <div class="flex items-center">
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-orange-500 flex items-center justify-center">
                                <i class="fas fa-medal text-white text-lg md:text-xl"></i>
                            </div>
                            <div class="ml-3 md:ml-4">
                                <p class="text-base md:text-lg font-bold text-[#133251]"><?php echo esc_html($experiencia_texto); ?></p>
                                <p class="text-sm md:text-base text-gray-600"><?php echo esc_html($experiencia_descripcion); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Espacio para la imagen en desktop -->
                <div class="hidden lg:flex lg:justify-center text-white p-2 sm:p-0 lg:w-[40%]">
                </div>
            </div>
        </div>
    </main>
    
    <style>
        /* Estilos adicionales para mejorar la responsividad */
        @media (max-width: 640px) {
            #hero-page {
                background-position: 65% center;
            }
            .hero-content {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-content {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }
        }
        
        /* Asegurar que el texto destacado tenga el color correcto */
        .highlight-text {
            color: #f97316; /* Este es el color orange-500 de Tailwind */
        }
    </style>
    <?php
    return ob_get_clean();
}

add_shortcode('hero_section', 'hero_section_shortcode');