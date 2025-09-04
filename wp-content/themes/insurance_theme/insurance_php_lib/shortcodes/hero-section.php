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
    <main class="w-full bg-cover bg-center bg-no-repeat" id="hero-page" style="<?php echo $bg_style; ?>">
        <div class="container mx-auto h-full flex items-center">
            <div class="flex flex-col lg:flex-row lg:items-center">
                <div class="hero-content bg-white p-8 rounded">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#133251] mb-6 leading-tight">
                        <?php echo stripslashes($titulo); ?>
                    </h1>
                    <p class="text-xl text-gray mb-10 max-w-2xl">
                        <?php echo stripslashes($subtitulo); ?>
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                        <a href="<?php echo esc_url($boton1_enlace); ?>" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                            <?php echo esc_html($boton1_texto); ?>
                            <i class="fas fa-phone-alt ml-3"></i>
                        </a>
                        <a href="<?php echo esc_url($boton2_enlace); ?>" class="bg-white border-2 border-[#133251] text-[#133251] hover:bg-orange-500 hover:border-orange-500 hover:text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center justify-center">
                            <i class="fas fa-shield-alt mr-3"></i>
                            <?php echo esc_html($boton2_texto); ?>
                        </a>
                    </div>
                    
                    <!-- Elemento decorativo -->
                    <div class="mt-16 flex items-center space-x-10">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-lg bg-orange-500 flex items-center justify-center">
                                <i class="fas fa-medal text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-bold text-[#133251]"><?php echo esc_html($experiencia_texto); ?></p>
                                <p class="text-gray-600"><?php echo esc_html($experiencia_descripcion); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:flex lg:justify-center text-white p-2 sm:p-0 lg:w-[70%]">
                </div>
            </div>
        </div>
    </main>
    <?php
    return ob_get_clean();
}

add_shortcode('hero_section', 'hero_section_shortcode');



