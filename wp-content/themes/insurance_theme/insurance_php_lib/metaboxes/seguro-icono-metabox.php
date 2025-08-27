<?php

    function agregar_meta_box_icono_seguro()
    {
        add_meta_box(
            'meta_box_icono_seguro',
            'Icono Representativo',
            'mostrar_meta_box_icono_seguro',
            'servicios-seguros',
            'side',
            'default'
        );
    }
    add_action('add_meta_boxes', 'agregar_meta_box_icono_seguro');

    // 2. Mostrar el metabox en el admin
    function mostrar_meta_box_icono_seguro($post)
    {
        $icono = get_post_meta($post->ID, '_icono_seguro', true);
        wp_nonce_field('guardar_icono_seguro', 'icono_nonce');
    ?>
    <div style="margin-bottom: 15px;">
        <label for="icono_seguro" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Clase de Icono (Font Awesome):
        </label>
        <input type="text"
               id="icono_seguro"
               name="icono_seguro"
               value="<?php echo esc_attr($icono); ?>"
               placeholder="Ej: fa-shield-alt"
               style="width: 100%; padding: 8px;">
    </div>

    <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 15px;">
        <h4 style="margin-top: 0;">Iconos Populares:</h4>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-shield-alt'">
                <i class="fa fa-shield"></i> fa-shield-alt
            </div>
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-heart'">
                <i class="fa fa-heart"></i> fa-heart
            </div>
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-home'">
                <i class="fa fa-home"></i> fa-home
            </div>
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-car'">
                <i class="fa fa-car"></i> fa-car
            </div>
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-user'">
                <i class="fa fa-user"></i> fa-user
            </div>
            <div style="cursor: pointer;" onclick="document.getElementById('icono_seguro').value = 'fa-stethoscope'">
                <i class="fa fa-stethoscope"></i> fa-stethoscope
            </div>
        </div>
        <p style="margin-top: 10px; margin-bottom: 0; font-size: 12px;">
            <a href="https://fontawesome.com/icons" target="_blank">Ver más iconos</a>
        </p>
    </div>


    <script>
    // Actualizar vista previa en tiempo real
    document.getElementById('icono_seguro').addEventListener('input', function(e) {
        // Esta funcionalidad se puede expandir con JavaScript más avanzado
        // para una vista previa en tiempo real si es necesario
    });
    </script>
    <?php
        }

        // 3. Guardar datos del metabox
        function guardar_meta_box_icono_seguro($post_id)
        {
            if (! isset($_POST['icono_nonce']) || ! wp_verify_nonce($_POST['icono_nonce'], 'guardar_icono_seguro')) {
                return;
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (! current_user_can('edit_post', $post_id)) {
                return;
            }

            if (isset($_POST['icono_seguro'])) {
                $icono = sanitize_text_field($_POST['icono_seguro']);
                update_post_meta($post_id, '_icono_seguro', $icono);
            }
    }
    add_action('save_post', 'guardar_meta_box_icono_seguro');