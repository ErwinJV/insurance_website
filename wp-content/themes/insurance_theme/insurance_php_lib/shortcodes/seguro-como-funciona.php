<?php

    function shortcode_como_funciona_seguro($atts)
    {
        $atts = shortcode_atts([
            'tipo_seguro'    => '',
            'titulo_seccion' => '¿Cómo funciona el Seguro',
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
        $pasos         = get_post_meta($post_id, '_pasos_como_funciona', true);
        $titulo_seguro = get_the_title();

        ob_start();
    ?>
    <!-- Sección de Cómo Funciona -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-[#133251] to-[#1e4a75] text-[#133251]">
        <div class="container mx-auto px-4 md:px-6 max-w-screen-xl">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-white"><?php echo $atts['titulo_seccion'] . ' ' . $titulo_seguro; ?></h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php if (is_array($pasos)): ?>
<?php foreach ($pasos as $index => $paso): ?>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <span class="text-[#133251] text-2xl font-bold"><?php echo $index + 1; ?></span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-[#133251]"><?php echo $paso['titulo']; ?></h3>
                        <p class="text-[#133251] text-opacity-90"><?php echo $paso['descripcion']; ?></p>
                    </div>
                    <?php endforeach; ?>
<?php else: ?>
                    <p class="text-white ">No se han configurado pasos para este tipo de seguro.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
        wp_reset_postdata();
            return ob_get_clean();
    }
    add_shortcode('como_funciona_seguro', 'shortcode_como_funciona_seguro');