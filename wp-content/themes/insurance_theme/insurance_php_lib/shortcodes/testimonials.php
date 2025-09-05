<?php
// Shortcode para mostrar testimonios
function testimonios_shortcode($atts)
{
    global $wpdb;
    $tabla_testimonios = $wpdb->prefix . 'testimonios';

    // Obtener testimonios de la base de datos
    $testimonios = $wpdb->get_results("SELECT * FROM $tabla_testimonios ORDER BY orden ASC, fecha_creacion DESC");

    // Obtener configuración del agente
    $agente_imagen = get_option('testimonios_agente_imagen', '');
    $agente_titulo = get_option('testimonios_agente_titulo', 'Protegiendo lo que más valoras');
    $agente_descripcion1 = get_option('testimonios_agente_descripcion1', 'Como agente de seguros certificado con más de 15 años de experiencia, me especializo en crear soluciones personalizadas que protejan lo que más valoras: tu familia, tu patrimonio y tu tranquilidad.');
    $agente_descripcion2 = get_option('testimonios_agente_descripcion2', 'Mi enfoque se basa en entender tus necesidades específicas para ofrecerte la cobertura perfecta, con el mejor equilibrio entre protección y costo.');
    $agente_boton_texto = get_option('testimonios_agente_boton_texto', 'Contactar ahora');

    // Usar imagen por defecto si no hay una configurada
    $imagen_agente = !empty($agente_imagen) ? $agente_imagen : INSURANCE_RESOURCES_URI . "/img/elvis-jimenez.png";

    if (empty($testimonios)) {
        return '<p>No hay testimonios para mostrar.</p>';
    }

    ob_start();
?>

<section class="py-12 md:py-16 lg:py-20 px-4 sm:px-6 lg:px-8 bg-white bg-[url(/src/img/testimonials-section-bg.webp)] bg-cover bg-center">
    <div class="max-w-7xl mx-auto">
        <!-- Título y descripción -->
        <div class="text-center mb-12 md:mb-16">
            <div class="mb-2" id="testimonios">
                <span class="section-subtitle text-[#133251] font-bold text-base md:text-lg tracking-wider">
                    TESTIMONIOS
                </span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-[#133251] mb-4">
                Lo que dicen nuestros <span class="text-orange-500"> clientes</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <!-- Columna izquierda: Testimonios -->
            <div class="order-2 lg:order-2">
                <!-- Contenedor relativo para el botón de flecha -->
                <div class="relative rounded">
                    <!-- Carrusel de testimonios -->
                    <div class="swiper testimonials-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonios as $testimonio): ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-card bg-white p-6 md:p-8 rounded-xl relative border-l-4 border-orange-500 min-h-[200px] md:min-h-[236px]">
                                        <i class="fas fa-quote-right quote-icon text-orange-500 text-xl md:text-2xl"></i>
                                        <div class="flex items-start mb-4 md:mb-6">
                                            <img src="<?php echo esc_url($testimonio->imagen); ?>"
                                                 alt="<?php echo esc_attr($testimonio->nombre); ?>"
                                                 class="w-12 h-12 md:w-16 md:h-16 rounded-full object-cover border-4 border-white shadow-lg">
                                            <div class="ml-4 md:ml-5">
                                                <h3 class="font-bold text-base md:text-lg lg:text-xl text-[#133251]"><?php echo esc_html($testimonio->nombre); ?></h3>
                                                <div class="flex mt-1">
                                                    <i class="fas fa-star text-orange-500 text-xs md:text-sm"></i>
                                                    <i class="fas fa-star text-orange-500 text-xs md:text-sm"></i>
                                                    <i class="fas fa-star text-orange-500 text-xs md:text-sm"></i>
                                                    <i class="fas fa-star text-orange-500 text-xs md:text-sm"></i>
                                                    <i class="fas fa-star text-orange-500 text-xs md:text-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-lg md:text-xl italic ">
                                            "<?php echo esc_html($testimonio->texto); ?>"
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Botón de flecha derecha personalizado -->
                    <div class="next-button">
                        <i class="fas fa-chevron-right text-base md:text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Información del agente -->
            <div class="order-1 lg:order-1 flex flex-col items-center lg:items-end">
                <div class="relative bg-[#133251] w-full max-w-xs md:max-w-md mx-auto lg:mx-0">
                    <img src="<?php echo esc_url($imagen_agente); ?>"
                         alt="Elvis Jiménez - Agente de Seguros"
                         class="agent-photo rounded-2xl w-full object-cover h-64 md:h-80 lg:h-96 xl:h-[500px]">

                    <div class="absolute -bottom-4 -right-4 md:-bottom-6 md:-right-6 bg-orange-500 text-white rounded-xl shadow-xl py-2 px-4 md:py-4 md:px-6">
                        <h4 class="font-bold text-base md:text-lg lg:text-xl">Elvis Jiménez</h4>
                        <p class="font-medium text-xs md:text-sm">Agente Certificado</p>
                    </div>
                </div>
                <div class="h-6 md:h-8 lg:h-10"></div>
                <div class="mb-8 md:mb-10 text-center lg:text-right max-w-full md:max-w-lg">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-bold text-[#133251] mb-3 md:mb-4">
                        <?php echo esc_html($agente_titulo); ?>
                    </h3>
                    <p class="text-[#133251] mb-4 md:mb-5 text-base md:text-lg lg:text-xl italic">
                       " <?php echo esc_html($agente_descripcion1); ?>"
                    </p>
                    <p class="text-[#133251] text-base md:text-lg lg:text-xl italic">
                        "<?php echo esc_html($agente_descripcion2); ?>"
                    </p>

                    <div class="mt-4 md:mt-6 flex justify-center lg:justify-end">
                        <a href="#contacto" class="bg-[#133251] hover:bg-orange-500 text-white font-bold py-2 px-6 md:py-3 md:px-8 rounded-lg transition duration-300 transform hover:scale-105 inline-flex items-center text-sm md:text-base">
                            <?php echo esc_html($agente_boton_texto); ?>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Estilos responsivos adicionales */
    @media (max-width: 640px) {
        .testimonial-card {
            margin: 0 0.5rem;
        }
    }
    
    .quote-icon {
        position: absolute;
        top: 1rem;
        right: 1rem;
        opacity: 0.2;
    }
    
    .next-button {
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
        background: #ea580c;;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        z-index: 10;
    }
    
    @media (max-width: 768px) {
        .next-button {
            right: -0.5rem;
            width: 2rem;
            height: 2rem;
        }
    }
</style>

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