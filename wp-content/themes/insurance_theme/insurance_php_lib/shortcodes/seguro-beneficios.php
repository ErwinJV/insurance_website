<?php

    function shortcode_beneficios_seguro($atts)
    {
        $atts = shortcode_atts([
            'tipo_seguro'       => '',
            'numero_beneficios' => -1,
            'titulo_seccion'    => 'Beneficios de los Seguros',
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
        $post_id       = get_the_ID();
        $beneficios    = get_post_meta($post_id, '_beneficios_seguro', true);
        $titulo_seguro = get_the_title();

        // Limitar número de beneficios si se especifica
        if ($atts['numero_beneficios'] > 0 && is_array($beneficios)) {
            $beneficios = array_slice($beneficios, 0, $atts['numero_beneficios']);
        }

        ob_start();
    ?>
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#133251] mb-12">
                <?php echo $atts['titulo_seccion'] . ' ' . $titulo_seguro; ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (is_array($beneficios)): ?>
<?php foreach ($beneficios as $beneficio): ?>
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                        <div class="p-6">
                            <div class="w-14 h-14 bg-[#133251] rounded-full flex items-center justify-center mb-4 transition duration-300 ease-in-out hover:scale-110">
                                <i class="fa                                             <?php echo $beneficio['icono']; ?> text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#133251] mb-2"><?php echo $beneficio['titulo']; ?></h3>
                            <p class="text-gray-600"><?php echo $beneficio['descripcion']; ?></p>
                        </div>
                        <div class="px-6 pb-4">
                            <a href="<?php echo $beneficio['url_enlace']; ?>" class="inline-flex items-center text-orange-500 font-medium transition duration-300 ease-in-out transform hover:translate-x-2">
                                <?php echo $beneficio['texto_enlace']; ?>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
<?php else: ?>
                    <p>No se han configurado beneficios para este tipo de seguro.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
        wp_reset_postdata();
            return ob_get_clean();
    }
    add_shortcode('beneficios_seguro', 'shortcode_beneficios_seguro');