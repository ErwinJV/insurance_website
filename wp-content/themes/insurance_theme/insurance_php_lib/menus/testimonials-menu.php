<?php
    // Crear tabla de testimonios al activar el tema
    function crear_tabla_testimonios()
    {
        global $wpdb;
        $tabla_testimonios = $wpdb->prefix . 'testimonios';
        $charset_collate   = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $tabla_testimonios (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        nombre varchar(100) NOT NULL,
        texto text NOT NULL,
        imagen varchar(255) NOT NULL,
        orden int(11) DEFAULT 0,
        fecha_creacion datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        // Verificar si la tabla se creó correctamente
        if ($wpdb->get_var("SHOW TABLES LIKE '$tabla_testimonios'") != $tabla_testimonios) {
            // Log error o mostrar mensaje de diagnóstico
            error_log('Error creando la tabla de testimonios: ' . $wpdb->last_error);
        }
    }
    add_action('after_setup_theme', 'crear_tabla_testimonios');

    // Agregar menú de administración para testimonios
    function testimonios_admin_menu()
    {
        add_menu_page(
            'Gestión de Testimonios',
            'Testimonios',
            'manage_options',
            'testimonios',
            'testimonios_admin_page',
            'dashicons-testimonial',
            25
        );
    }
    add_action('admin_menu', 'testimonios_admin_menu');

    // Página de administración de testimonios
    function testimonios_admin_page()
    {
        global $wpdb;
        $tabla_testimonios = $wpdb->prefix . 'testimonios';

        // Procesar eliminación
        if (isset($_GET['borrar']) && wp_verify_nonce($_GET['_wpnonce'], 'borrar_testimonio')) {
            $id = intval($_GET['borrar']);
            $wpdb->delete($tabla_testimonios, ['id' => $id]);
            echo '<div class="notice notice-success is-dismissible"><p>Testimonio eliminado correctamente.</p></div>';
        }

        // Procesar guardado
        if (isset($_POST['guardar_testimonio']) && wp_verify_nonce($_POST['testimonio_nonce'], 'guardar_testimonio')) {
            $nombre = sanitize_text_field($_POST['nombre']);
            $texto  = sanitize_textarea_field($_POST['texto']);
            $imagen = esc_url_raw($_POST['imagen']);
            $orden  = intval($_POST['orden']);

            if (isset($_POST['testimonio_id']) && ! empty($_POST['testimonio_id'])) {
                // Editar testimonio existente
                $id        = intval($_POST['testimonio_id']);
                $resultado = $wpdb->update(
                    $tabla_testimonios,
                    ['nombre' => $nombre, 'texto' => $texto, 'imagen' => $imagen, 'orden' => $orden],
                    ['id' => $id]
                );
                if ($resultado !== false) {
                    echo '<div class="notice notice-success is-dismissible"><p>Testimonio actualizado correctamente.</p></div>';
                } else {
                    echo '<div class="notice notice-error is-dismissible"><p>Error al actualizar el testimonio: ' . $wpdb->last_error . '</p></div>';
                }
            } else {
                // Agregar nuevo testimonio
                $resultado = $wpdb->insert(
                    $tabla_testimonios,
                    ['nombre' => $nombre, 'texto' => $texto, 'imagen' => $imagen, 'orden' => $orden]
                );
                if ($resultado !== false) {
                    echo '<div class="notice notice-success is-dismissible"><p>Testimonio agregado correctamente.</p></div>';
                } else {
                    echo '<div class="notice notice-error is-dismissible"><p>Error al agregar el testimonio: ' . $wpdb->last_error . '</p></div>';
                }
            }
        }

        // Procesar guardado de la configuración del agente
        if (isset($_POST['guardar_config_agente']) && wp_verify_nonce($_POST['config_agente_nonce'], 'guardar_config_agente')) {
            update_option('testimonios_agente_imagen', esc_url_raw($_POST['agente_imagen']));
            update_option('testimonios_agente_titulo', sanitize_text_field($_POST['agente_titulo']));
            update_option('testimonios_agente_descripcion1', sanitize_textarea_field($_POST['agente_descripcion1']));
            update_option('testimonios_agente_descripcion2', sanitize_textarea_field($_POST['agente_descripcion2']));
            update_option('testimonios_agente_boton_texto', sanitize_text_field($_POST['agente_boton_texto']));

            echo '<div class="notice notice-success is-dismissible"><p>Configuración del agente guardada correctamente.</p></div>';
        }

        // Obtener testimonio para editar
        $testimonio_editar = null;
        if (isset($_GET['editar']) && wp_verify_nonce($_GET['_wpnonce'], 'editar_testimonio')) {
            $id                = intval($_GET['editar']);
            $testimonio_editar = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tabla_testimonios WHERE id = %d", $id));
        }

        // Obtener todos los testimonios
        $testimonios = $wpdb->get_results("SELECT * FROM $tabla_testimonios ORDER BY orden ASC, fecha_creacion DESC");

        // Obtener valores actuales del agente
        $agente_imagen = get_option('testimonios_agente_imagen', '');
        $agente_titulo = get_option('testimonios_agente_titulo', 'Protegiendo lo que más valoras');
        $agente_descripcion1 = get_option('testimonios_agente_descripcion1', 'Como agente de seguros certificado con más de 15 años de experiencia, me especializo en crear soluciones personalizadas que protejan lo que más valoras: tu familia, tu patrimonio y tu tranquilidad.');
        $agente_descripcion2 = get_option('testimonios_agente_descripcion2', 'Mi enfoque se basa en entender tus necesidades específicas para ofrecerte la cobertura perfecta, con el mejor equilibrio entre protección y costo.');
        $agente_boton_texto = get_option('testimonios_agente_boton_texto', 'Contactar ahora');

        // Verificar si hay errores de base de datos
        if ($wpdb->last_error) {
            error_log('Error en consulta de testimonios: ' . $wpdb->last_error);
        }
    ?>

    <div class="wrap">
        <h1>Gestión de Testimonios</h1>

        <div class="testimonios-admin-container" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
            <!-- Formulario para agregar/editar testimonios -->
            <div style="flex: 1; min-width: 400px; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h2><?php echo $testimonio_editar ? 'Editar Testimonio' : 'Agregar Nuevo Testimonio'; ?></h2>

                <form method="post" action="">
                    <?php wp_nonce_field('guardar_testimonio', 'testimonio_nonce'); ?>
                    <?php if ($testimonio_editar): ?>
                        <input type="hidden" name="testimonio_id" value="<?php echo $testimonio_editar->id; ?>">
                    <?php endif; ?>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="nombre">Nombre del Cliente</label></th>
                            <td>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $testimonio_editar ? esc_attr($testimonio_editar->nombre) : ''; ?>" class="regular-text" required>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="texto">Texto del Testimonio</label></th>
                            <td>
                                <textarea id="texto" name="texto" rows="5" class="large-text" required><?php echo $testimonio_editar ? esc_textarea($testimonio_editar->texto) : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="imagen">URL de la Imagen</label></th>
                            <td>
                                <input type="url" id="imagen" name="imagen" value="<?php echo $testimonio_editar ? esc_url($testimonio_editar->imagen) : ''; ?>" class="regular-text" required>
                                <button type="button" class="button button-secondary upload-imagen" style="margin-top: 5px;">Seleccionar Imagen</button>
                                <?php if ($testimonio_editar && ! empty($testimonio_editar->imagen)): ?>
                                    <div style="margin-top: 10px;">
                                        <img src="<?php echo esc_url($testimonio_editar->imagen); ?>" alt="Vista previa" style="max-width: 100px; height: auto; border-radius: 4px;">
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="orden">Orden de Visualización</label></th>
                            <td>
                                <input type="number" id="orden" name="orden" value="<?php echo $testimonio_editar ? intval($testimonio_editar->orden) : 0; ?>" class="small-text">
                                <p class="description">Número menor = se muestra primero (opcional)</p>
                            </td>
                        </tr>
                    </table>

                    <p class="submit">
                        <input type="submit" name="guardar_testimonio" class="button button-primary" value="<?php echo $testimonio_editar ? 'Actualizar Testimonio' : 'Agregar Testimonio'; ?>">
                        <?php if ($testimonio_editar): ?>
                            <a href="<?php echo admin_url('admin.php?page=testimonios'); ?>" class="button">Cancelar</a>
                        <?php endif; ?>
                    </p>
                </form>
            </div>

            <!-- Lista de testimonios existentes -->
            <div style="flex: 1; min-width: 400px; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h2>Testimonios Existentes</h2>

                <?php if ($testimonios && count($testimonios) > 0): ?>
                    <table class="wp-list-table widefat fixed striped">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Texto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($testimonios as $testimonio): ?>
                                <tr>
                                    <td>
                                        <?php if (! empty($testimonio->imagen)): ?>
                                            <img src="<?php echo esc_url($testimonio->imagen); ?>" alt="<?php echo esc_attr($testimonio->nombre); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                        <?php else: ?>
                                            <div style="width: 50px; height: 50px; background: #f3f4f5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <span class="dashicons dashicons-format-image"></span>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo esc_html($testimonio->nombre); ?></td>
                                    <td><?php echo esc_html(wp_trim_words($testimonio->texto, 10)); ?></td>
                                    <td>
                                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=testimonios&editar=' . $testimonio->id), 'editar_testimonio'); ?>" class="button">Editar</a>
                                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=testimonios&borrar=' . $testimonio->id), 'borrar_testimonio'); ?>" class="button button-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este testimonio?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No hay testimonios aún. Agrega el primero usando el formulario.</p>
                <?php endif; ?>
            </div>

            <!-- Sección de configuración del agente -->
            <div style="flex-basis: 100%; margin-top: 30px; background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h2>Configuración de la Sección del Agente</h2>

                <form method="post" action="">
                    <?php wp_nonce_field('guardar_config_agente', 'config_agente_nonce'); ?>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="agente_imagen">URL de la Imagen del Agente</label></th>
                            <td>
                                <input type="url" id="agente_imagen" name="agente_imagen" value="<?php echo esc_url($agente_imagen); ?>" class="regular-text">
                                <button type="button" class="button button-secondary upload-imagen-agente" style="margin-top: 5px;">Seleccionar Imagen</button>
                                <?php if (! empty($agente_imagen)): ?>
                                    <div style="margin-top: 10px;">
                                        <img src="<?php echo esc_url($agente_imagen); ?>" alt="Vista previa" style="max-width: 200px; height: auto; border-radius: 4px;">
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="agente_titulo">Título del Agente</label></th>
                            <td>
                                <input type="text" id="agente_titulo" name="agente_titulo" value="<?php echo esc_attr($agente_titulo); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="agente_descripcion1">Primer Párrafo</label></th>
                            <td>
                                <textarea id="agente_descripcion1" name="agente_descripcion1" rows="3" class="large-text"><?php echo esc_textarea($agente_descripcion1); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="agente_descripcion2">Segundo Párrafo</label></th>
                            <td>
                                <textarea id="agente_descripcion2" name="agente_descripcion2" rows="3" class="large-text"><?php echo esc_textarea($agente_descripcion2); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="agente_boton_texto">Texto del Botón</label></th>
                            <td>
                                <input type="text" id="agente_boton_texto" name="agente_boton_texto" value="<?php echo esc_attr($agente_boton_texto); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>

                    <p class="submit">
                        <input type="submit" name="guardar_config_agente" class="button button-primary" value="Guardar Configuración del Agente">
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Uploader de medios para la imagen
        $('.upload-imagen').click(function(e) {
            e.preventDefault();

            var button = $(this),
            custom_uploader = wp.media({
                title: 'Seleccionar Imagen',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Usar esta imagen'
                },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#imagen').val(attachment.url);

                // Mostrar vista previa
                $('#imagen').nextAll('img').remove();
                $('<div style="margin-top: 10px;"><img src="' + attachment.url + '" alt="Vista previa" style="max-width: 100px; height: auto; border-radius: 4px;"></div>').insertAfter($('#imagen').next('button'));
            }).open();
        });

        // Uploader de medios para la imagen del agente
        $('.upload-imagen-agente').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Seleccionar Imagen del Agente',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Usar esta imagen'
                },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#agente_imagen').val(attachment.url);

                // Mostrar vista previa
                $('#agente_imagen').nextAll('div').remove();
                $('<div style="margin-top: 10px;"><img src="' + attachment.url + '" alt="Vista previa" style="max-width: 200px; height: auto; border-radius: 4px;"></div>').insertAfter($('#agente_imagen').next('button'));
            }).open();
        });
    });
    </script>

    <style>
    .button-danger {
        background: #d63638 !important;
        border-color: #d63638 !important;
        color: white !important;
    }
    .testimonios-admin-container {
        margin-top: 20px;
    }
    @media (max-width: 768px) {
        .testimonios-admin-container {
            flex-direction: column;
        }
    }
    </style>
    <?php
    }