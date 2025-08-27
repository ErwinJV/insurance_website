<?php

    // Agregar meta box para consejos
    function agregar_meta_box_consejos()
    {
        add_meta_box(
            'meta_box_consejos',
            'Consejos para este Tipo de Seguro',
            'mostrar_meta_box_consejos',
            'servicios',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'agregar_meta_box_consejos');

    // Mostrar meta box en el admin
    function mostrar_meta_box_consejos($post)
    {
        $consejos = get_post_meta($post->ID, '_consejos_seguro', true);
        $consejos = is_array($consejos) ? $consejos : [];

        wp_nonce_field('guardar_consejos_seguro', 'consejos_nonce');
    ?>
    <div id="consejos-container">
        <?php foreach ($consejos as $index => $consejo): ?>
            <div class="consejo-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd;">
                <h3>Consejo #<?php echo $index + 1; ?></h3>
                <p>
                    <label>Título del Consejo:</label>
                    <input type="text" name="consejos_titulo[]" value="<?php echo esc_attr($consejo['titulo']); ?>" style="width: 100%; margin-bottom: 10px;">
                </p>
                <p>
                    <label>Descripción:</label>
                    <textarea name="consejos_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"><?php echo esc_textarea($consejo['descripcion']); ?></textarea>
                </p>
                <p>
                    <label>Icono (Font Awesome):</label>
                    <input type="text" name="consejos_icono[]" value="<?php echo esc_attr($consejo['icono']); ?>" placeholder="Ej: fa-chart-line" style="width: 100%; margin-bottom: 10px;">
                </p>
                <h4>Puntos específicos:</h4>
                <div class="puntos-consejo">
                    <?php foreach ($consejo['puntos'] as $punto): ?>
                        <input type="text" name="consejos_puntos_<?php echo $index; ?>[]" value="<?php echo esc_attr($punto); ?>" style="width: 100%; margin-bottom: 5px;">
                    <?php endforeach; ?>
                </div>
                <button type="button" class="agregar-punto" data-index="<?php echo $index; ?>" style="margin-top: 10px;">Agregar Punto</button>
                <button type="button" class="eliminar-consejo" style="margin-top: 10px; color: red; float: right;">Eliminar Consejo</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="agregar-consejo" style="margin-top: 20px;">Agregar Nuevo Consejo</button>
    <script>
    jQuery(document).ready(function($) {
        // Agregar nuevo consejo
        $('#agregar-consejo').click(function() {
            var index = $('.consejo-item').length;
            var nuevoConsejo = `
                <div class="consejo-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd;">
                    <h3>Consejo #${index + 1}</h3>
                    <p>
                        <label>Título del Consejo:</label>
                        <input type="text" name="consejos_titulo[]" value="" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <p>
                        <label>Descripción:</label>
                        <textarea name="consejos_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"></textarea>
                    </p>
                    <p>
                        <label>Icono (Font Awesome):</label>
                        <input type="text" name="consejos_icono[]" value="" placeholder="Ej: fa-chart-line" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <h4>Puntos específicos:</h4>
                    <div class="puntos-consejo">
                        <input type="text" name="consejos_puntos_${index}[]" value="" style="width: 100%; margin-bottom: 5px;">
                    </div>
                    <button type="button" class="agregar-punto" data-index="${index}" style="margin-top: 10px;">Agregar Punto</button>
                    <button type="button" class="eliminar-consejo" style="margin-top: 10px; color: red; float: right;">Eliminar Consejo</button>
                </div>
            `;
            $('#consejos-container').append(nuevoConsejo);
        });

        // Agregar nuevo punto a un consejo
        $(document).on('click', '.agregar-punto', function() {
            var index = $(this).data('index');
            var nuevoPunto = `<input type="text" name="consejos_puntos_${index}[]" value="" style="width: 100%; margin-bottom: 5px;">`;
            $(this).siblings('.puntos-consejo').append(nuevoPunto);
        });

        // Eliminar consejo
        $(document).on('click', '.eliminar-consejo', function() {
            $(this).closest('.consejo-item').remove();
            // Reordenar números de consejos
            $('.consejo-item').each(function(i) {
                $(this).find('h3').text('Consejo #' + (i + 1));
            });
        });
    });
    </script>
    <?php
        }

        // Guardar datos del meta box
        function guardar_meta_box_consejos($post_id)
        {
            if (! isset($_POST['consejos_nonce']) || ! wp_verify_nonce($_POST['consejos_nonce'], 'guardar_consejos_seguro')) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (! current_user_can('edit_post', $post_id)) {
                return;
            }

            $consejos = [];

            if (isset($_POST['consejos_titulo']) && is_array($_POST['consejos_titulo'])) {
                for ($i = 0; $i < count($_POST['consejos_titulo']); $i++) {
                    if (! empty($_POST['consejos_titulo'][$i])) {
                        $puntos = isset($_POST['consejos_puntos_' . $i]) ? $_POST['consejos_puntos_' . $i] : [];
                        $puntos = array_filter($puntos, function ($punto) {
                            return ! empty(trim($punto));
                        });

                        $consejos[] = [
                            'titulo'      => sanitize_text_field($_POST['consejos_titulo'][$i]),
                            'descripcion' => sanitize_textarea_field($_POST['consejos_descripcion'][$i]),
                            'icono'       => sanitize_text_field($_POST['consejos_icono'][$i]),
                            'puntos'      => $puntos,
                        ];
                    }
                }
            }

            update_post_meta($post_id, '_consejos_seguro', $consejos);
    }
    add_action('save_post', 'guardar_meta_box_consejos');