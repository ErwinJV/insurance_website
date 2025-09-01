<?php
    // Agregar menú de administración para la sección de contacto
    add_action('admin_menu', 'contacto_editable_menu');

    function contacto_editable_menu()
    {
        add_menu_page(
            'Configuración de Contacto',
            'Sección Contacto',
            'manage_options',
            'contacto-editable',
            'contacto_editable_admin',
            'dashicons-email-alt',
            30
        );
    }

    // Página de administración
    function contacto_editable_admin()
    {
        // Guardar configuración si se envió el formulario
        if (isset($_POST['contacto_nonce']) && wp_verify_nonce($_POST['contacto_nonce'], 'guardar_contacto')) {
            update_option('contacto_shortcode', sanitize_text_field($_POST['shortcode']));
            update_option('contacto_titulo', sanitize_text_field($_POST['titulo']));
            update_option('contacto_subtitulo', sanitize_text_field($_POST['subtitulo']));
            update_option('contacto_porque_titulo', sanitize_text_field($_POST['porque_titulo']));
            update_option('contacto_porque_descripcion', sanitize_textarea_field($_POST['porque_descripcion']));
            update_option('contacto_cita', sanitize_textarea_field($_POST['cita']));
            update_option('contacto_horario', sanitize_textarea_field($_POST['horario']));
            update_option('contacto_direccion', sanitize_textarea_field($_POST['direccion']));
            update_option('contacto_email_destinatario', sanitize_email($_POST['email_destinatario']));

            // Procesar imagen del agente
            if (! empty($_POST['imagen_agente_id'])) {
                $image_id  = intval($_POST['imagen_agente_id']);
                $image_url = wp_get_attachment_url($image_id);
                update_option('contacto_imagen_agente_id', $image_id);
                update_option('contacto_imagen_agente', $image_url);
            } elseif (isset($_POST['eliminar_imagen']) && $_POST['eliminar_imagen'] == 1) {
                delete_option('contacto_imagen_agente_id');
                delete_option('contacto_imagen_agente');
            }

            echo '<div class="notice notice-success is-dismissible"><p>Configuración guardada correctamente.</p></div>';
        }

        // Obtener valores actuales
        $shortcode          = get_option('contacto_shortcode', '');
        $titulo             = get_option('contacto_titulo', 'Protege tu futuro con <span class="text-orange-500">asesoría experta</span>');
        $subtitulo          = get_option('contacto_subtitulo', 'Completa el formulario y uno de nuestros especialistas en seguros te contactará para brindarte soluciones personalizadas que se adapten a tus necesidades.');
        $porque_titulo      = get_option('contacto_porque_titulo', '¿Por qué contactar con Elvis Jimenez Seguros?');
        $porque_descripcion = get_option('contacto_porque_descripcion', 'Con más de 15 años de experiencia protegiendo a familias hispanas, te ofrecemos soluciones de seguros que combinan cobertura completa, precios accesibles y atención personalizada. Nuestros expertos te guiarán para tomar la mejor decisión.');
        $cita               = get_option('contacto_cita', 'Mi compromiso es entender tus necesidades y ofrecerte soluciones de seguros que brinden tranquilidad y seguridad financiera a tu familia.');
        $horario            = get_option('contacto_horario', "Lunes a Viernes: 9am - 6pm\nSábados: 10am - 2pm");
        $direccion          = get_option('contacto_direccion', "123 Calle Seguridad\nMiami, FL 33101");
        $email_destinatario = get_option('contacto_email_destinatario', get_option('admin_email'));
        $imagen_agente_id   = get_option('contacto_imagen_agente_id', '');
        $imagen_agente      = get_option('contacto_imagen_agente', '');

        // Asegurarse de que WordPress carga los scripts necesarios para la biblioteca de medios
        wp_enqueue_media();
    ?>

    <div class="wrap contacto-admin-wrap">
        <style>
            .contacto-admin-wrap {
                max-width: 1200px;
                margin: 20px auto;
            }

            .contacto-admin-header {
                border-bottom: 1px solid #e2e8f0;
                padding-bottom: 20px;
                margin-bottom: 25px;
            }

            .contacto-admin-header h1 {
                color: #1e293b;
                font-size: 28px;
                margin: 0;
            }

            .contacto-admin-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }

            .contacto-admin-card {
                background: #f6f7f7;
                border: 1px solid #ccd0d4;
                border-radius: 4px;
                padding: 15px 20px;
            }

            .contacto-admin-card h3 {
                margin-top: 0;
                color: #1e293b;
                font-size: 18px;
                padding-bottom: 10px;
                border-bottom: 1px solid #dcdcde;
            }

            .contacto-admin-field {
                margin-bottom: 15px;
            }

            .contacto-admin-field label {
                display: block;
                font-weight: 600;
                margin-bottom: 5px;
                color: #1d2327;
            }

            .contacto-admin-field input[type="text"],
            .contacto-admin-field input[type="email"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #8c8f94;
                border-radius: 4px;
                font-size: 14px;
                background: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            }

            .contacto-admin-field input[type="text"]:focus,
            .contacto-admin-field input[type="email"]:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }

            .contacto-admin-field textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #8c8f94;
                border-radius: 4px;
                font-size: 14px;
                min-height: 100px;
                resize: vertical;
                background: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            }

            .contacto-admin-field textarea:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }

            .contacto-admin-field .description {
                font-size: 13px;
                color: #646970;
                margin-top: 5px;
                font-style: italic;
            }

            .contacto-admin-submit {
                background: #f6f7f7;
                padding: 20px;
                border-radius: 4px;
                text-align: center;
                margin-top: 20px;
                border: 1px solid #ccd0d4;
            }

            .image-preview-container {
                margin-top: 15px;
                text-align: center;
            }

            .image-preview {
                max-width: 200px;
                max-height: 200px;
                border: 1px solid #dcdcde;
                padding: 4px;
                border-radius: 4px;
                margin-bottom: 10px;
                display: inline-block;
                background: #fff;
            }

            .image-preview img {
                max-width: 100%;
                height: auto;
                display: block;
            }

            .media-button-wrapper {
                margin-bottom: 15px;
            }

            .remove-image-button {
                background: #d63638;
                color: white;
                padding: 8px 12px;
                border-radius: 4px;
                display: inline-block;
                cursor: pointer;
                font-weight: 600;
                border: 1px solid #d63638;
                font-size: 13px;
                line-height: 1.2;
            }

            .remove-image-button:hover {
                background: #b32d2e;
                border-color: #b32d2e;
            }

            @media (max-width: 768px) {
                .contacto-admin-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <script>
        jQuery(document).ready(function($) {
            // Variables para la biblioteca de medios
            var frame;
            var imageIdInput = $("#imagen_agente_id");
            var imagePreview = $("#image-preview");
            var removeButton = $("#remove-image-button");

            // Abrir la biblioteca de medios al hacer clic en el botón
            $("#upload-image-button").on("click", function(e) {
                e.preventDefault();

                // Si ya existe el frame, ábrelo
                if (frame) {
                    frame.open();
                    return;
                }

                // Crear un nuevo frame
                frame = wp.media({
                    title: "Seleccionar imagen del agente",
                    button: {
                        text: "Usar esta imagen"
                    },
                    multiple: false
                });

                // Cuando se selecciona una imagen
                frame.on("select", function() {
                    var attachment = frame.state().get("selection").first().toJSON();
                    imageIdInput.val(attachment.id);
                    imagePreview.attr("src", attachment.url).show();
                    removeButton.show();
                });

                // Abrir el frame
                frame.open();
            });

            // Eliminar la imagen seleccionada
            removeButton.on("click", function(e) {
                e.preventDefault();
                if (confirm("¿Estás seguro de que quieres eliminar la imagen?")) {
                    imageIdInput.val("");
                    imagePreview.attr("src", "").hide();
                    $(this).hide();
                }
            });
        });
        </script>

        <div class="contacto-admin-header">
            <h1>Configuración de la Sección de Contacto</h1>
        </div>

        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('guardar_contacto', 'contacto_nonce'); ?>

            <div class="contacto-admin-grid">
                <div class="contacto-admin-card">
                    <h3>Información Principal</h3>

                    <div class="contacto-admin-field">
                        <label for="titulo">Título principal</label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo esc_attr(stripslashes($titulo)); ?>">
                        <p class="description">Use &lt;span class="text-orange-500"&gt;texto&lt;/span&gt; para resaltar en naranja</p>
                    </div>

                    <div class="contacto-admin-field">
                        <label for="subtitulo">Subtítulo</label>
                        <textarea id="subtitulo" name="subtitulo" rows="3"><?php echo esc_textarea(stripslashes($subtitulo)); ?></textarea>
                    </div>

                    <div class="contacto-admin-field">
                        <label for="email_destinatario">Email destinatario</label>
                        <input type="email" id="email_destinatario" name="email_destinatario" value="<?php echo esc_attr($email_destinatario); ?>">
                        <p class="description">Email donde se recibirán los mensajes del formulario</p>
                    </div>
                </div>

                <div class="contacto-admin-card">
                    <h3>Información Adicional</h3>

                    <div class="contacto-admin-field">
                        <label for="porque_titulo">Título "¿Por qué contactar?"</label>
                        <input type="text" id="porque_titulo" name="porque_titulo" value="<?php echo esc_attr(stripslashes($porque_titulo)); ?>">
                    </div>

                    <div class="contacto-admin-field">
                        <label for="porque_descripcion">Descripción "¿Por qué contactar?"</label>
                        <textarea id="porque_descripcion" name="porque_descripcion" rows="5"><?php echo esc_textarea(stripslashes($porque_descripcion)); ?></textarea>
                    </div>

                    <div class="contacto-admin-field">
                        <label for="cita">Texto de la cita</label>
                        <textarea id="cita" name="cita" rows="3"><?php echo esc_textarea(stripslashes($cita)); ?></textarea>
                    </div>
                </div>

                <div class="contacto-admin-card">
                    <h3>Información de Contacto</h3>

                    <div class="contacto-admin-field">
                        <label for="horario">Horario de atención</label>
                        <textarea id="horario" name="horario" rows="2"><?php echo esc_textarea(stripslashes($horario)); ?></textarea>
                        <p class="description">Separar líneas con saltos de línea</p>
                    </div>

                    <div class="contacto-admin-field">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" name="direccion" rows="2"><?php echo esc_textarea(stripslashes($direccion)); ?></textarea>
                        <p class="description">Separar líneas con saltos de línea</p>
                    </div>
                      <div class="contacto-admin-field">
                        <label for="shortcode">Shortcode del formulario de contacto</label>
                        <input type="text" id="shortcode" name="shortcode" value="<?php echo esc_attr(stripslashes($shortcode)); ?>">
                        <p class="description">Pegue aquí el shortcode de su formulario de contacto</p>
                    </div>
                </div>

                <div class="contacto-admin-card">
                    <h3>Imagen del Agente</h3>

                    <div class="contacto-admin-field">
                        <label>Seleccionar imagen</label>
                        <div class="media-button-wrapper">
                            <button type="button" id="upload-image-button" class="button">Seleccionar desde la biblioteca</button>
                            <input type="hidden" id="imagen_agente_id" name="imagen_agente_id" value="<?php echo esc_attr($imagen_agente_id); ?>">
                        </div>

                        <div class="image-preview-container">
                            <?php if ($imagen_agente): ?>
                                <div class="image-preview">
                                    <img id="image-preview" src="<?php echo esc_url($imagen_agente); ?>" alt="Vista previa">
                                </div>
                                <button type="button" id="remove-image-button" class="remove-image-button">Eliminar imagen</button>
                            <?php else: ?>
                                <div class="image-preview">
                                    <img id="image-preview" src="" alt="Vista previa" style="display: none;">
                                </div>
                                <button type="button" id="remove-image-button" class="remove-image-button" style="display: none;">Eliminar imagen</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contacto-admin-submit">
                <?php submit_button('Guardar Cambios', 'primary', 'submit'); ?>
            </div>
        </form>
    </div>
    <?php
    }