<?php
    // Agregar meta box para consejos
    function agregar_meta_box_consejos()
    {
        add_meta_box(
            'meta_box_consejos',
            'Consejos para este Tipo de Seguro',
            'mostrar_meta_box_consejos',
            'servicios-seguros',
            'normal',
            'high'
        );

        // Agregar estilos solo para este metabox
        add_action('admin_head', 'estilos_meta_box_consejos');
    }
    add_action('add_meta_boxes', 'agregar_meta_box_consejos');

    // Estilos para el metabox de consejos
    function estilos_meta_box_consejos()
    {
        echo '<style>
        /* Estilos del contenedor de consejos */
        .consejos-container {
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

        /* Estilos de cada consejo */
        .consejo-item {
            background: #f6f7f7;
            border: 1px solid #dcdcde;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            transition: all 0.2s ease;
        }

        .consejo-item:hover {
            border-color: #8c8f94;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .consejo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dcdcde;
        }

        .consejo-numero {
            font-size: 16px;
            font-weight: 600;
            color: #2c3338;
            display: flex;
            align-items: center;
        }

        .consejo-numero:before {
            content: "";
            display: inline-block;
            width: 24px;
            height: 24px;
            background-color: #2271b1;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 10px;
            font-size: 14px;
        }

        .eliminar-consejo {
            background: none;
            border: none;
            color: #d63638;
            cursor: pointer;
            font-size: 13px;
            text-decoration: underline;
            padding: 0;
        }

        .eliminar-consejo:hover {
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

        /* Puntos específicos */
        .puntos-consejo {
            margin-bottom: 15px;
        }

        .punto-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .punto-item input {
            flex: 1;
            margin-right: 8px;
        }

        .eliminar-punto {
            background: none;
            border: none;
            color: #d63638;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .eliminar-punto:hover {
            color: #ff2c29;
        }

        /* Botones */
        .boton-primario {
            background: #2271b1;
            border: 1px solid #2271b1;
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
            background: #135e96;
            border-color: #135e96;
            color: #fff;
        }

        .boton-secundario {
            background: #f6f7f7;
            border: 1px solid #dcdcde;
            color: #2271b1;
            text-decoration: none;
            text-shadow: none;
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            line-height: 1.4;
            transition: all 0.2s ease;
        }

        .boton-secundario:hover {
            background: #ecedee;
            border-color: #8c8f94;
            color: #135e96;
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
            .consejo-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .eliminar-consejo {
                margin-top: 10px;
            }

            .punto-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .punto-item input {
                width: 100%;
                margin-right: 0;
                margin-bottom: 8px;
            }
        }
    </style>';
    }

    // Mostrar meta box en el admin
    function mostrar_meta_box_consejos($post)
    {
        $consejos = get_post_meta($post->ID, '_consejos_seguro', true);
        $consejos = is_array($consejos) ? $consejos : [];

        wp_nonce_field('guardar_consejos_seguro', 'consejos_nonce');
    ?>
    <div id="consejos-container" class="consejos-container">
        <?php if (empty($consejos)): ?>
            <div class="empty-state">
                <p>No hay consejos agregados. ¡Agrega tu primer consejo!</p>
            </div>
        <?php else: ?>
<?php foreach ($consejos as $index => $consejo): ?>
                <div class="consejo-item">
                    <div class="consejo-header">
                        <span class="consejo-numero">Consejo                                                                                                                                                                                     <?php echo $index + 1; ?></span>
                        <button type="button" class="eliminar-consejo">Eliminar Consejo</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Consejo:</label>
                            <input type="text" name="consejos_titulo[]" value="<?php echo esc_attr($consejo['titulo']); ?>" placeholder="Ej: Compara diferentes opciones">
                        </div>
                        <div class="campo">
                            <label>Icono (Font Awesome):</label>
                            <input type="text" name="consejos_icono[]" value="<?php echo esc_attr($consejo['icono']); ?>" placeholder="Ej: fa-chart-line">
                        </div>
                    </div>
                    <div class="campo">
                        <label>Descripción:</label>
                        <textarea name="consejos_descripcion[]" placeholder="Describe este consejo..."><?php echo esc_textarea($consejo['descripcion']); ?></textarea>
                    </div>
                    <div class="campo">
                        <label>Puntos específicos:</label>
                        <div class="puntos-consejo">
                            <?php foreach ($consejo['puntos'] as $punto_index => $punto): ?>
                                <div class="punto-item">
                                    <input type="text" name="consejos_puntos_<?php echo $index; ?>[]" value="<?php echo esc_attr($punto); ?>" placeholder="Ej: Revisa las coberturas incluidas">
                                    <button type="button" class="eliminar-punto">×</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="agregar-punto boton-secundario" data-index="<?php echo $index; ?>">+ Agregar Punto</button>
                    </div>
                </div>
            <?php endforeach; ?>
<?php endif; ?>
    </div>
    <button type="button" id="agregar-consejo" class="boton-primario">+ Agregar Nuevo Consejo</button>

    <script>
    jQuery(document).ready(function($) {
        var consejoCount =                                                                               <?php echo count($consejos); ?>;

        // Función para actualizar números de consejo
        function actualizarNumerosConsejos() {
            $('.consejo-item').each(function(index) {
                $(this).find('.consejo-numero').text('Consejo ' + (index + 1));
                // Actualizar data-index en botones de agregar punto
                $(this).find('.agregar-punto').data('index', index);
            });
        }

        // Agregar nuevo consejo
        $('#agregar-consejo').click(function() {
            consejoCount++;
            var nuevoConsejo = `
                <div class="consejo-item">
                    <div class="consejo-header">
                        <span class="consejo-numero">Consejo ${consejoCount}</span>
                        <button type="button" class="eliminar-consejo">Eliminar Consejo</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Consejo:</label>
                            <input type="text" name="consejos_titulo[]" value="" placeholder="Ej: Compara diferentes opciones">
                        </div>
                        <div class="campo">
                            <label>Icono (Font Awesome):</label>
                            <input type="text" name="consejos_icono[]" value="" placeholder="Ej: fa-chart-line">
                        </div>
                    </div>
                    <div class="campo">
                        <label>Descripción:</label>
                        <textarea name="consejos_descripcion[]" placeholder="Describe este consejo..."></textarea>
                    </div>
                    <div class="campo">
                        <label>Puntos específicos:</label>
                        <div class="puntos-consejo">
                            <div class="punto-item">
                                <input type="text" name="consejos_puntos_${consejoCount-1}[]" value="" placeholder="Ej: Revisa las coberturas incluidas">
                                <button type="button" class="eliminar-punto">×</button>
                            </div>
                        </div>
                        <button type="button" class="agregar-punto boton-secundario" data-index="${consejoCount-1}">+ Agregar Punto</button>
                    </div>
                </div>
            `;
            $('#consejos-container .empty-state').remove();
            $('#consejos-container').append(nuevoConsejo);
            actualizarNumerosConsejos();
        });

        // Agregar nuevo punto a un consejo
        $(document).on('click', '.agregar-punto', function() {
            var index = $(this).data('index');
            var nuevoPunto = `
                <div class="punto-item">
                    <input type="text" name="consejos_puntos_${index}[]" value="" placeholder="Ej: Revisa las coberturas incluidas">
                    <button type="button" class="eliminar-punto">×</button>
                </div>
            `;
            $(this).siblings('.puntos-consejo').append(nuevoPunto);
        });

        // Eliminar punto
        $(document).on('click', '.eliminar-punto', function() {
            $(this).closest('.punto-item').remove();
        });

        // Eliminar consejo
        $(document).on('click', '.eliminar-consejo', function() {
            $(this).closest('.consejo-item').remove();
            consejoCount--;
            actualizarNumerosConsejos();

            // Mostrar estado vacío si no hay consejos
            if ($('.consejo-item').length === 0) {
                $('#consejos-container').html('<div class="empty-state"><p>No hay consejos agregados. ¡Agrega tu primer consejo!</p></div>');
            }
        });

        // Inicializar números de consejo
        actualizarNumerosConsejos();
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