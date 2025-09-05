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

        // Agregar estilos solo para este metabox
        add_action('admin_head', 'estilos_meta_box_beneficios');
    }
    add_action('add_meta_boxes', 'agregar_meta_box_beneficios');

    // Estilos para el metabox de beneficios
    function estilos_meta_box_beneficios()
    {
        echo '<style>
        /* Estilos del contenedor de beneficios */
        .beneficios-container {
            margin-bottom: 20px;
        }

        /* Estado vacío */
        .empty-state {
            text-align: center;
            padding: 30px;
            background: #f6f7f7;
            border: 1px dashed #dcdcde;
            border-radius: 4px;
            color: #646970;
            margin-bottom: 20px;
        }

        .empty-state p {
            margin: 0 0 15px 0;
            font-size: 14px;
        }

        /* Estilos de cada beneficio */
        .beneficio-item {
            background: #f6f7f7;
            border: 1px solid #dcdcde;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            transition: all 0.2s ease;
        }

        .beneficio-item:hover {
            border-color: #8c8f94;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .beneficio-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dcdcde;
        }

        .beneficio-numero {
            font-size: 16px;
            font-weight: 600;
            color: #2c3338;
            display: flex;
            align-items: center;
        }

        .beneficio-numero:before {
            content: "";
            display: inline-block;
            width: 24px;
            height: 24px;
            background-color: #00a32a;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 10px;
            font-size: 14px;
        }

        .eliminar-beneficio {
            background: none;
            border: none;
            color: #d63638;
            cursor: pointer;
            font-size: 13px;
            text-decoration: underline;
            padding: 0;
        }

        .eliminar-beneficio:hover {
            color: #ff2c29;
        }

        /* Campos de formulario */
        .campo {
            margin-bottom: 15px;
        }

        .campo label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #1d2327;
        }

        .campo input[type="text"],
        .campo textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #8c8f94;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.4;
            transition: border-color 0.2s ease;
        }

        .campo input[type="text"]:focus,
        .campo textarea:focus {
            border-color: #2271b1;
            box-shadow: 0 0 0 1px #2271b1;
            outline: 2px solid transparent;
        }

        .campo textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Enlaces */
        .enlace-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Botones */
        .boton-primario {
            background: #00a32a;
            border: 1px solid #00a32a;
            color: #fff;
            text-decoration: none;
            text-shadow: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            line-height: 1.4;
            transition: background 0.2s ease;
        }

        .boton-primario:hover {
            background: #008a20;
            border-color: #008a20;
            color: #fff;
        }

        /* Responsividad */
        @media screen and (min-width: 783px) {
            .campo-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }
        }

        @media screen and (max-width: 782px) {
            .beneficio-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .eliminar-beneficio {
                margin-top: 10px;
            }

            .enlace-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Icono de vista previa */
        .icono-preview {
            margin-top: 5px;
            font-size: 24px;
            color: #2271b1;
        }
    </style>';
    }

    // Mostrar el metabox en el admin
    function mostrar_meta_box_beneficios($post)
    {
        $beneficios = get_post_meta($post->ID, '_beneficios_seguro', true);
        $beneficios = is_array($beneficios) ? $beneficios : [];

        wp_nonce_field('guardar_beneficios_seguro', 'beneficios_nonce');
    ?>
    <div id="beneficios-container" class="beneficios-container">
        <?php if (empty($beneficios)): ?>
            <div class="empty-state">
                <p>No hay beneficios agregados. ¡Agrega tu primer beneficio!</p>
            </div>
        <?php else: ?>
<?php foreach ($beneficios as $index => $beneficio): ?>
                <div class="beneficio-item">
                    <div class="beneficio-header">
                        <span class="beneficio-numero">Beneficio                                                                                                                                 <?php echo $index + 1; ?></span>
                        <button type="button" class="eliminar-beneficio">Eliminar Beneficio</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Beneficio:</label>
                            <input type="text" name="beneficios_titulo[]" value="<?php echo esc_attr($beneficio['titulo']); ?>" placeholder="Ej: Cobertura completa">
                        </div>
                        <div class="campo">
                            <label>Icono (Font Awesome):</label>
                            <input type="text" name="beneficios_icono[]" value="<?php echo esc_attr($beneficio['icono']); ?>" placeholder="Ej: fa-shield-alt" class="icono-input">
                            <div class="icono-preview">
                                <i class="<?php echo esc_attr($beneficio['icono']); ?>"></i>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <label>Descripción:</label>
                        <textarea name="beneficios_descripcion[]" placeholder="Describe este beneficio..."><?php echo esc_textarea($beneficio['descripcion']); ?></textarea>
                    </div>
                    <div class="enlace-grid">
                        <div class="campo">
                            <label>Texto del Enlace:</label>
                            <input type="text" name="beneficios_texto_enlace[]" value="<?php echo esc_attr($beneficio['texto_enlace']); ?>" placeholder="Ej: Contactar">
                        </div>
                        <div class="campo">
                            <label>URL del Enlace:</label>
                            <input type="text" name="beneficios_url_enlace[]" value="<?php echo esc_attr($beneficio['url_enlace']); ?>" placeholder="Ej: #contacto">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
<?php endif; ?>
    </div>
    <button type="button" id="agregar-beneficio" class="boton-primario">+ Agregar Nuevo Beneficio</button>

    <script>
    jQuery(document).ready(function($) {
        var beneficioCount =                                                         <?php echo count($beneficios); ?>;

        // Función para actualizar números de beneficio
        function actualizarNumerosBeneficios() {
            $('.beneficio-item').each(function(index) {
                $(this).find('.beneficio-numero').text('Beneficio ' + (index + 1));
            });
        }

        // Función para actualizar vista previa de icono
        function actualizarPreviewIcono() {
            $('.icono-input').on('input', function() {
                var iconClass = $(this).val();
                $(this).siblings('.icono-preview').html('<i class="' + iconClass + '"></i>');
            });
        }

        // Agregar nuevo beneficio
        $('#agregar-beneficio').click(function() {
            beneficioCount++;
            var nuevoBeneficio = `
                <div class="beneficio-item">
                    <div class="beneficio-header">
                        <span class="beneficio-numero">Beneficio ${beneficioCount}</span>
                        <button type="button" class="eliminar-beneficio">Eliminar Beneficio</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Beneficio:</label>
                            <input type="text" name="beneficios_titulo[]" value="" placeholder="Ej: Cobertura completa">
                        </div>
                        <div class="campo">
                            <label>Icono (Font Awesome):</label>
                            <input type="text" name="beneficios_icono[]" value="" placeholder="Ej: fa-shield-alt" class="icono-input">
                            <div class="icono-preview">
                                <i class=""></i>
                            </div>
                        </div>
                    </div>
                    <div class="campo">
                        <label>Descripción:</label>
                        <textarea name="beneficios_descripcion[]" placeholder="Describe este beneficio..."></textarea>
                    </div>
                    <div class="enlace-grid">
                        <div class="campo">
                            <label>Texto del Enlace:</label>
                            <input type="text" name="beneficios_texto_enlace[]" value="Contactar" placeholder="Ej: Contactar">
                        </div>
                        <div class="campo">
                            <label>URL del Enlace:</label>
                            <input type="text" name="beneficios_url_enlace[]" value="#contacto" placeholder="Ej: #contacto">
                        </div>
                    </div>
                </div>
            `;
            $('#beneficios-container .empty-state').remove();
            $('#beneficios-container').append(nuevoBeneficio);
            actualizarNumerosBeneficios();
            actualizarPreviewIcono();
        });

        // Eliminar beneficio
        $(document).on('click', '.eliminar-beneficio', function() {
            $(this).closest('.beneficio-item').remove();
            beneficioCount--;
            actualizarNumerosBeneficios();

            // Mostrar estado vacío si no hay beneficios
            if ($('.beneficio-item').length === 0) {
                $('#beneficios-container').html('<div class="empty-state"><p>No hay beneficios agregados. ¡Agrega tu primer beneficio!</p></div>');
            }
        });

        // Inicializar vista previa de iconos
        actualizarPreviewIcono();

        // Inicializar números de beneficio
        actualizarNumerosBeneficios();
    });
    </script>
    <?php
        }

        // Guardar datos del metabox
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