<?php

    // Shortcode para mostrar sección de consejos
    function shortcode_consejos_seguro($atts)
    {
        $atts = shortcode_atts([
            'tipo_seguro'            => '',
            'numero_consejos'        => -1,
            'mostrar_info_adicional' => 'true',
            'mostrar_cta'            => 'true',
        ], $atts);

        $args = [
            'post_type'      => 'servicios-seguros',
            'posts_per_page' => 1,
            'name'           => $atts['tipo_seguro'],
        ];

        $query = new WP_Query($args);

        if (! $query->have_posts()) {
            return '<p>No se encontró el tipo de seguro especificado.</p>';
        }

        $query->the_post();
        $post_id            = get_the_ID();
        $consejos           = get_post_meta($post_id, '_consejos_seguro', true);
        $titulo_seguro      = get_the_title();
        $descripcion_seguro = get_the_content();

        // Limitar número de consejos si se especifica
        if ($atts['numero_consejos'] > 0) {
            $consejos = array_slice($consejos, 0, $atts['numero_consejos']);
        }

        ob_start();
    ?>
    <section class="py-16 md:py-24 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)">
        <div class="max-w-6xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#133251] mb-6">
                    Consejos para Elegir un Seguro                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo $titulo_seguro; ?>
                </h2>
                <div class="w-24 h-1 bg-orange-500 mx-auto mb-6"></div>
                <!-- <p class="text-lg md:text-xl text-[#133251]/90 max-w-3xl mx-auto">
                    <?php
                        //echo $descripcion_seguro;
                        ?>
                </p> -->
            </div>

            <!-- Tarjetas de consejos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($consejos as $index => $consejo): ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="h-48 overflow-hidden">
                        <div class="bg-[#133251] h-full flex items-center justify-center">
                            <i class="fa                                                                                                                                                                                                                                                 <?php echo $consejo['icono']; ?> text-6xl text-white"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                <span class="text-xl font-bold text-orange-500"><?php echo $index + 1; ?></span>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251]"><?php echo $consejo['titulo']; ?></h3>
                        </div>
                        <p class="text-[#133251]/90 mb-4">
                            <?php echo $consejo['descripcion']; ?>
                        </p>
                        <div class="mt-4">
                            <ul class="space-y-2 text-[#133251]/90">
                                <?php foreach ($consejo['puntos'] as $punto): ?>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-orange-500 mt-1 mr-2"></i>
                                    <span><?php echo $punto; ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>



            <?php if ($atts['mostrar_cta'] === 'true'): ?>
            <!-- Llamada a la acción -->
            <div class="mt-16 text-center">

                <a href="#contacto" class="inline-block px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-calendar-check mr-2"></i> Agendar consulta gratuita
                </a>

            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
        wp_reset_postdata();
            return ob_get_clean();
    }
    add_shortcode('consejos_seguro', 'shortcode_consejos_seguro');