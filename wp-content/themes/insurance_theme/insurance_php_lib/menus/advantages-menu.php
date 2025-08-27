<?php

    // Agregar menú de administración para gestionar la sección completa
    function advantages_section_admin_menu()
    {
        add_menu_page(
            'Configuración de Sección de Ventajas',
            'Sección Ventajas',
            'manage_options',
            'advantages-section',
            'advantages_section_admin_page',
            'dashicons-star-filled',
            25
        );

        // Añadir estilos CSS para el formulario responsive
        add_action('admin_head', 'advantages_section_admin_styles');
        // Añadir scripts para el uploader de medios
        add_action('admin_enqueue_scripts', 'advantages_section_admin_scripts');
    }
    add_action('admin_menu', 'advantages_section_admin_menu');

    // Estilos CSS para el formulario responsive
    function advantages_section_admin_styles()
    {
        $screen = get_current_screen();
        if ($screen->id === 'toplevel_page_advantages-section') {
            echo '
        <style>
            /* Estilos generales */
            .advantage-field-group {
                margin-bottom: 20px;
                padding: 15px;
                border: 1px solid #ccd0d4;
                background: #fff;
                border-radius: 4px;
            }

            .advantage-field-group h3 {
                margin-top: 0;
                color: #23282d;
            }

            /* Grid responsive */
            .advantages-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 15px;
            }

            @media (min-width: 768px) {
                .advantages-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .advantages-grid .full-width {
                    grid-column: 1 / -1;
                }
            }

            @media (min-width: 1200px) {
                .advantages-grid {
                    grid-template-columns: 1fr 1fr 1fr;
                }
            }

            /* Campos de formulario */
            .advantage-field {
                margin-bottom: 15px;
            }

            .advantage-field label {
                display: block;
                margin-bottom: 5px;
                font-weight: 600;
            }

            .advantage-field input[type="text"],
            .advantage-field textarea,
            .advantage-field select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .advantage-field textarea {
                min-height: 100px;
                resize: vertical;
            }

            .advantage-field .description {
                font-size: 12px;
                color: #666;
                margin-top: 5px;
            }

            /* Botones */
            .button-group {
                margin-top: 20px;
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .remove-advantage {
                margin-top: 10px;
            }

            /* Mejoras para móviles */
            @media (max-width: 782px) {
                .advantage-field-group {
                    padding: 10px;
                }

                .button-group {
                    flex-direction: column;
                }

                .button {
                    width: 100%;
                    text-align: center;
                    margin-bottom: 5px;
                }
            }

            /* Indicador de campos requeridos */
            .required::after {
                content: " *";
                color: #dc3232;
            }

            /* Previsualización de imagen */
            .image-preview {
                max-width: 200px;
                height: auto;
                margin-top: 10px;
                display: block;
            }

            .image-preview-placeholder {
                display: block;
                width: 200px;
                height: 150px;
                background: #f1f1f1;
                border: 1px dashed #ccc;
                margin-top: 10px;
                text-align: center;
                line-height: 150px;
                color: #666;
            }
        </style>
        ';
        }
    }

    // Scripts para el uploader de medios
    function advantages_section_admin_scripts($hook)
    {
        if ($hook !== 'toplevel_page_advantages-section') {
            return;
        }
        wp_enqueue_media();
        wp_enqueue_script('advantages-section-admin', get_template_directory_uri() . '/js/advantages-section-admin.js', ['jquery'], null, true);
    }

    // Página de administración para gestionar la sección completa
    function advantages_section_admin_page()
    {
        // Guardar los datos si se ha enviado el formulario
        if (isset($_POST['update_advantages']) && wp_verify_nonce($_POST['_wpnonce'], 'advantages_section_nonce')) {
            // Ventajas
            $advantages = [];
            if (! empty($_POST['advantage_title'])) {
                foreach ($_POST['advantage_title'] as $index => $title) {
                    if (! empty($title) && ! empty($_POST['advantage_description'][$index])) {
                        $advantages[] = [
                            'title'       => sanitize_text_field($title),
                            'description' => sanitize_textarea_field($_POST['advantage_description'][$index]),
                            'icon'        => sanitize_text_field($_POST['advantage_icon'][$index]),
                        ];
                    }
                }
            }
            update_option('advantages_section_data', $advantages);

            // Configuración general
            $general_settings = [
                'section_title'       => sanitize_text_field($_POST['section_title']),
                'section_description' => sanitize_textarea_field($_POST['section_description']),
                'agent_quote'         => sanitize_textarea_field($_POST['agent_quote']),
                'agent_name'          => sanitize_text_field($_POST['agent_name']),
                'agent_title'         => sanitize_text_field($_POST['agent_title']),
                'button_text'         => sanitize_text_field($_POST['button_text']),
                'years_experience'    => sanitize_text_field($_POST['years_experience']),
                'families_protected'  => sanitize_text_field($_POST['families_protected']),
                'satisfaction_rate'   => sanitize_text_field($_POST['satisfaction_rate']),
                'support_available'   => sanitize_text_field($_POST['support_available']),
                'agent_image'         => esc_url_raw($_POST['agent_image']),
            ];
            update_option('advantages_section_general', $general_settings);

            echo '<div class="notice notice-success is-dismissible"><p>Configuración de la sección guardada correctamente.</p></div>';
        }

        // Obtener ventajas actuales
        $advantages       = get_option('advantages_section_data', []);
        $general_settings = get_option('advantages_section_general', []);

        // Valores por defecto para la configuración general
        $defaults = [
            'section_title'       => 'Por qué elegir a <span class="text-orange-500">nuestros servicios</span> como tu <span class="highlight">solución ideal</span>',
            'section_description' => 'Más de 15 años de experiencia ofreciendo soluciones personalizadas que se adaptan a las necesidades y presupuesto de cada cliente.',
            'agent_quote'         => 'Nuestro compromiso es brindarte tranquilidad con soluciones que realmente protegen lo que más valoras.',
            'agent_name'          => 'Equipo de Expertos',
            'agent_title'         => 'Profesionales Certificados',
            'button_text'         => 'Solicitar Consulta',
            'years_experience'    => '15+',
            'families_protected'  => '2K+',
            'satisfaction_rate'   => '98%',
            'support_available'   => '24/7',
            'agent_image'         => '',
        ];
        $general_settings = wp_parse_args($general_settings, $defaults);

        // Asegurarse de que tenemos al menos un campo vacío para ventajas
        if (empty($advantages)) {
            $advantages = [
                ['title' => '', 'description' => '', 'icon' => 'fas fa-check'],
            ];
        }
    ?>
    <div class="wrap">
        <h1>Gestión de Sección de Ventajas</h1>
        <p>Configure aquí todos los elementos de la sección de ventajas de su sitio web.</p>

        <form method="post" action="">
            <?php wp_nonce_field('advantages_section_nonce', '_wpnonce'); ?>

            <h2>Configuración General</h2>
            <div class="advantage-field-group">
                <div class="advantages-grid">
                    <div class="advantage-field full-width">
                        <label class="required">Título de la sección:</label>
                        <input type="text" name="section_title" value="<?php echo esc_attr($general_settings['section_title']); ?>" class="widefat" required>
                        <p class="description">Puede usar HTML para resaltar partes del texto. Ej: &lt;span class="text-orange-500"&gt;texto en naranja&lt;/span&gt;</p>
                    </div>
                    <div class="advantage-field full-width">
                        <label class="required">Descripción de la sección:</label>
                        <textarea name="section_description" class="widefat" rows="3" required><?php echo esc_textarea($general_settings['section_description']); ?></textarea>
                    </div>
                    <div class="advantage-field full-width">
                        <label class="required">Cita del agente:</label>
                        <textarea name="agent_quote" class="widefat" rows="3" required><?php echo esc_textarea($general_settings['agent_quote']); ?></textarea>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Nombre del agente:</label>
                        <input type="text" name="agent_name" value="<?php echo esc_attr($general_settings['agent_name']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Título del agente:</label>
                        <input type="text" name="agent_title" value="<?php echo esc_attr($general_settings['agent_title']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Texto del botón:</label>
                        <input type="text" name="button_text" value="<?php echo esc_attr($general_settings['button_text']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Años de experiencia:</label>
                        <input type="text" name="years_experience" value="<?php echo esc_attr($general_settings['years_experience']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Familias protegidas:</label>
                        <input type="text" name="families_protected" value="<?php echo esc_attr($general_settings['families_protected']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Satisfacción de clientes:</label>
                        <input type="text" name="satisfaction_rate" value="<?php echo esc_attr($general_settings['satisfaction_rate']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field">
                        <label class="required">Soporte disponible:</label>
                        <input type="text" name="support_available" value="<?php echo esc_attr($general_settings['support_available']); ?>" class="widefat" required>
                    </div>
                    <div class="advantage-field full-width">
                        <label>Imagen del agente (URL):</label>
                        <input type="text" name="agent_image" id="agent_image" value="<?php echo esc_attr($general_settings['agent_image']); ?>" class="widefat">
                        <button type="button" class="button" id="upload_image_button">Seleccionar imagen</button>
                        <p class="description">Suba una imagen o ingrese la URL. Si está vacío, se usará un icono por defecto.</p>
                        <div id="image_preview">
                            <?php if (! empty($general_settings['agent_image'])): ?>
                                <img src="<?php echo esc_url($general_settings['agent_image']); ?>" class="image-preview">
                            <?php else: ?>
                                <div class="image-preview-placeholder">Vista previa de la imagen</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <h2>Ventajas</h2>
            <div id="advantages-container">
                <?php foreach ($advantages as $index => $advantage): ?>
                <div class="advantage-field-group">
                    <h3>Ventaja #<?php echo $index + 1; ?></h3>
                    <div class="advantages-grid">
                        <div class="advantage-field">
                            <label class="required">Título:</label>
                            <input type="text" name="advantage_title[]" value="<?php echo esc_attr($advantage['title']); ?>" class="widefat" required>
                        </div>
                        <div class="advantage-field full-width">
                            <label class="required">Descripción:</label>
                            <textarea name="advantage_description[]" class="widefat" rows="3" required><?php echo esc_textarea($advantage['description']); ?></textarea>
                        </div>
                        <div class="advantage-field">
                            <label>Icono (FontAwesome):</label>
                            <input type="text" name="advantage_icon[]" value="<?php echo esc_attr($advantage['icon']); ?>" class="widefat" placeholder="Ej: fas fa-check">
                            <p class="description">Usar clases de FontAwesome. Ej: fas fa-check, fas fa-shield-alt</p>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="button" class="button button-secondary remove-advantage">Eliminar ventaja</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="button-group">
                <button type="button" id="add-advantage" class="button button-primary">+ Añadir otra ventaja</button>
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar configuración">
                <input type="hidden" name="update_advantages" value="1">
            </div>
        </form>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Añadir nuevo campo de ventaja
        $('#add-advantage').on('click', function() {
            var index = $('#advantages-container .advantage-field-group').length;
            var html = `
            <div class="advantage-field-group">
                <h3>Ventaja #${index + 1}</h3>
                <div class="advantages-grid">
                    <div class="advantage-field">
                        <label class="required">Título:</label>
                        <input type="text" name="advantage_title[]" value="" class="widefat" required>
                    </div>
                    <div class="advantage-field full-width">
                        <label class="required">Descripción:</label>
                        <textarea name="advantage_description[]" class="widefat" rows="3" required></textarea>
                    </div>
                    <div class="advantage-field">
                        <label>Icono (FontAwesome):</label>
                        <input type="text" name="advantage_icon[]" value="fas fa-check" class="widefat" placeholder="Ej: fas fa-check">
                        <p class="description">Usar clases de FontAwesome. Ej: fas fa-check, fas fa-shield-alt</p>
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="button button-secondary remove-advantage">Eliminar ventaja</button>
                </div>
            </div>
            `;
            $('#advantages-container').append(html);
        });

        // Eliminar campo de ventaja
        $(document).on('click', '.remove-advantage', function() {
            if ($('#advantages-container .advantage-field-group').length > 1) {
                $(this).closest('.advantage-field-group').remove();

                // Renumerar las ventajas
                $('#advantages-container .advantage-field-group').each(function(index) {
                    $(this).find('h3').text('Ventaja #' + (index + 1));
                });
            } else {
                alert('Debe haber al menos una ventaja.');
            }
        });

        // Uploader de imagen
        $('#upload_image_button').on('click', function(e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Seleccionar imagen',
                multiple: false
            }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;
                $('#agent_image').val(image_url);
                $('#image_preview').html('<img src="' + image_url + '" class="image-preview">');
            });
        });
    });
    </script>
    <?php
    }