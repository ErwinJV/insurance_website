<?php
    function agregar_meta_box_beneficios()
    {
        add_meta_box(
            'meta_box_beneficios',
            'Beneficios de este Tipo de Seguro',
            'mostrar_meta_box_beneficios',
            'servicios-seguros',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'agregar_meta_box_beneficios');

    // 2. Mostrar el metabox en el admin
    function mostrar_meta_box_beneficios($post)
    {
        $beneficios = get_post_meta($post->ID, '_beneficios_seguro', true);
        $beneficios = is_array($beneficios) ? $beneficios : [];

        wp_nonce_field('guardar_beneficios_seguro', 'beneficios_nonce');
    ?>
    <div id="beneficios-container">
        <?php foreach ($beneficios as $index => $beneficio): ?>
            <div class="beneficio-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
                <h3>Beneficio #<?php echo $index + 1; ?></h3>
                <p>
                    <label>Título del Beneficio:</label>
                    <input type="text" name="beneficios_titulo[]" value="<?php echo esc_attr($beneficio['titulo']); ?>" style="width: 100%; margin-bottom: 10px;">
                </p>
                <p>
                    <label>Descripción:</label>
                    <textarea name="beneficios_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"><?php echo esc_textarea($beneficio['descripcion']); ?></textarea>
                </p>
                <p>
                    <label>Icono (Font Awesome):</label>
                    <input type="text" name="beneficios_icono[]" value="<?php echo esc_attr($beneficio['icono']); ?>" placeholder="Ej: fa-chart-line" style="width: 100%; margin-bottom: 10px;">
                </p>
                <p>
                    <label>Texto del Enlace:</label>
                    <input type="text" name="beneficios_texto_enlace[]" value="<?php echo esc_attr($beneficio['texto_enlace']); ?>" placeholder="Ej: Contactar" style="width: 100%; margin-bottom: 10px;">
                </p>
                <p>
                    <label>URL del Enlace:</label>
                    <input type="text" name="beneficios_url_enlace[]" value="<?php echo esc_attr($beneficio['url_enlace']); ?>" placeholder="Ej: #contacto" style="width: 100%; margin-bottom: 10px;">
                </p>
                <button type="button" class="eliminar-beneficio" style="margin-top: 10px; color: red;">Eliminar Beneficio</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="agregar-beneficio" style="margin-top: 20px; padding: 10px 15px; background: #0073aa; color: white; border: none; border-radius: 5px; cursor: pointer;">Agregar Nuevo Beneficio</button>

    <script>
    jQuery(document).ready(function($) {
        // Agregar nuevo beneficio
        $('#agregar-beneficio').click(function() {
            var index = $('.beneficio-item').length;
            var nuevoBeneficio = `
                <div class="beneficio-item" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">
                    <h3>Beneficio #${index + 1}</h3>
                    <p>
                        <label>Título del Beneficio:</label>
                        <input type="text" name="beneficios_titulo[]" value="" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <p>
                        <label>Descripción:</label>
                        <textarea name="beneficios_descripcion[]" style="width: 100%; height: 80px; margin-bottom: 10px;"></textarea>
                    </p>
                    <p>
                        <label>Icono (Font Awesome):</label>
                        <input type="text" name="beneficios_icono[]" value="" placeholder="Ej: fa-chart-line" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <p>
                        <label>Texto del Enlace:</label>
                        <input type="text" name="beneficios_texto_enlace[]" value="Contactar" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <p>
                        <label>URL del Enlace:</label>
                        <input type="text" name="beneficios_url_enlace[]" value="#contacto" style="width: 100%; margin-bottom: 10px;">
                    </p>
                    <button type="button" class="eliminar-beneficio" style="margin-top: 10px; color: red;">Eliminar Beneficio</button>
                </div>
            `;
            $('#beneficios-container').append(nuevoBeneficio);
        });

        // Eliminar beneficio
        $(document).on('click', '.eliminar-beneficio', function() {
            $(this).closest('.beneficio-item').remove();
            // Reordenar números de beneficios
            $('.beneficio-item').each(function(i) {
                $(this).find('h3').text('Beneficio #' + (i + 1));
            });
        });
    });
    </script>
    <?php
        }

        // 3. Guardar datos del metabox
        function guardar_meta_box_beneficios($post_id)
        {
            if (! isset($_POST['beneficios_nonce']) || ! wp_verify_nonce($_POST['beneficios_nonce'], 'guardar_beneficios_seguro')) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (! current_user_can('edit_post', $post_id)) {
                return;
            }

            $beneficios = [];

            if (isset($_POST['beneficios_titulo']) && is_array($_POST['beneficios_titulo'])) {
                for ($i = 0; $i < count($_POST['beneficios_titulo']); $i++) {
                    if (! empty($_POST['beneficios_titulo'][$i])) {
                        $beneficios[] = [
                            'titulo'       => sanitize_text_field($_POST['beneficios_titulo'][$i]),
                            'descripcion'  => sanitize_textarea_field($_POST['beneficios_descripcion'][$i]),
                            'icono'        => sanitize_text_field($_POST['beneficios_icono'][$i]),
                            'texto_enlace' => sanitize_text_field($_POST['beneficios_texto_enlace'][$i]),
                            'url_enlace'   => sanitize_text_field($_POST['beneficios_url_enlace'][$i]),
                        ];
                    }
                }
            }

            update_post_meta($post_id, '_beneficios_seguro', $beneficios);
    }
    add_action('save_post', 'guardar_meta_box_beneficios');