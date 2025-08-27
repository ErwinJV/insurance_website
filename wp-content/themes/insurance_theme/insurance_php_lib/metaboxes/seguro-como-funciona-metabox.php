<?php

    function agregar_meta_box_como_funciona()
    {
        add_meta_box(
            'meta_box_como_funciona',
            'Pasos de "Cómo Funciona"',
            'mostrar_meta_box_como_funciona',
            'servicios-seguros',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'agregar_meta_box_como_funciona');

    // 2. Mostrar el metabox en el admin
    function mostrar_meta_box_como_funciona($post)
    {
        $pasos = get_post_meta($post->ID, '_pasos_como_funciona', true);
        $pasos = is_array($pasos) ? $pasos : [];

        wp_nonce_field('guardar_pasos_como_funciona', 'pasos_nonce');
    ?>
    <div id="pasos-container">
        <?php foreach ($pasos as $index => $paso): ?>
            <div class="paso-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
                <h3>Paso #<?php echo $index + 1; ?></h3>
                <p>
                    <label>Título del Paso:</label>
                    <input type="text" name="pasos_titulo[]" value="<?php echo esc_attr($paso['titulo']); ?>" style="width: 100%; margin-bottom: 10px;">
                </p>
                <p>
                    <label>Descripción:</label>
                    <textarea name="pasos_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"><?php echo esc_textarea($paso['descripcion']); ?></textarea>
                </p>
                <button type="button" class="eliminar-paso" style="margin-top: 10px; color: red;">Eliminar Paso</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="agregar-paso" style="margin-top: 20px; padding: 10px 15px; background: #0073aa; color: white; border: none; border-radius: 5px; cursor: pointer;">Agregar Nuevo Paso</button>

    <script>
    jQuery(document).ready(function($) {
        // Agregar nuevo paso
        $('#agregar-paso').click(function() {
            var index = $('.paso-item').length;
            var nuevoPaso = `
                <div class="paso-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
                    <h3>Paso #${index + 1}</h3>
                    <p>
                        <label>Título del Paso:</label>
                        <input type="text" name="pasos_titulo[]" value="" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <p>
                        <label>Descripción:</label>
                        <textarea name="pasos_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"></textarea>
                    </p>
                    <button type="button" class="eliminar-paso" style="margin-top: 10px; color: red;">Eliminar Paso</button>
                </div>
            `;
            $('#pasos-container').append(nuevoPaso);
        });

        // Eliminar paso
        $(document).on('click', '.eliminar-paso', function() {
            $(this).closest('.paso-item').remove();
            // Reordenar números de pasos
            $('.paso-item').each(function(i) {
                $(this).find('h3').text('Paso #' + (i + 1));
            });
        });
    });
    </script>
    <?php
        }

        // 3. Guardar datos del metabox
        function guardar_meta_box_como_funciona($post_id)
        {
            if (! isset($_POST['pasos_nonce']) || ! wp_verify_nonce($_POST['pasos_nonce'], 'guardar_pasos_como_funciona')) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (! current_user_can('edit_post', $post_id)) {
                return;
            }

            $pasos = [];

            if (isset($_POST['pasos_titulo']) && is_array($_POST['pasos_titulo'])) {
                for ($i = 0; $i < count($_POST['pasos_titulo']); $i++) {
                    if (! empty($_POST['pasos_titulo'][$i])) {
                        $pasos[] = [
                            'titulo'      => sanitize_text_field($_POST['pasos_titulo'][$i]),
                            'descripcion' => sanitize_textarea_field($_POST['pasos_descripcion'][$i]),
                        ];
                    }
                }
            }

            update_post_meta($post_id, '_pasos_como_funciona', $pasos);
    }
    add_action('save_post', 'guardar_meta_box_como_funciona');