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

        // Agregar estilos solo para este metabox
        add_action('admin_head', 'estilos_meta_box_como_funciona');
    }
    add_action('add_meta_boxes', 'agregar_meta_box_como_funciona');

    // Estilos para el metabox
    function estilos_meta_box_como_funciona()
    {
        echo '<style>
        /* Estilos del contenedor de pasos */
        .pasos-container {
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

        /* Estilos de cada paso */
        .paso-item {
            background: #f6f7f7;
            border: 1px solid #dcdcde;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            transition: all 0.2s ease;
        }

        .paso-item:hover {
            border-color: #8c8f94;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .paso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dcdcde;
        }

        .paso-numero {
            font-size: 16px;
            font-weight: 600;
            color: #2c3338;
            display: flex;
            align-items: center;
        }

        .paso-numero:before {
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

        .eliminar-paso {
            background: none;
            border: none;
            color: #d63638;
            cursor: pointer;
            font-size: 13px;
            text-decoration: underline;
            padding: 0;
        }

        .eliminar-paso:hover {
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

        /* Responsividad */
        @media screen and (min-width: 783px) {
            .campo-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }
        }

        @media screen and (max-width: 782px) {
            .paso-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .eliminar-paso {
                margin-top: 10px;
            }
        }
    </style>';
    }

    // Mostrar el metabox en el admin
    function mostrar_meta_box_como_funciona($post)
    {
        $pasos = get_post_meta($post->ID, '_pasos_como_funciona', true);
        $pasos = is_array($pasos) ? $pasos : [];

        wp_nonce_field('guardar_pasos_como_funciona', 'pasos_nonce');
    ?>
    <div id="pasos-container" class="pasos-container">
        <?php if (empty($pasos)): ?>
            <div class="empty-state">
                <p>No hay pasos agregados. ¡Agrega tu primer paso!</p>
            </div>
        <?php else: ?>
<?php foreach ($pasos as $index => $paso): ?>
                <div class="paso-item">
                    <div class="paso-header">
                        <span class="paso-numero">Paso                                                                                                             <?php echo $index + 1; ?></span>
                        <button type="button" class="eliminar-paso">Eliminar Paso</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Paso:</label>
                            <input type="text" name="pasos_titulo[]" value="<?php echo esc_attr($paso['titulo']); ?>" placeholder="Ej: Contacta con nuestro equipo">
                        </div>
                        <div class="campo">
                            <label>Descripción:</label>
                            <textarea name="pasos_descripcion[]" placeholder="Describe este paso..."><?php echo esc_textarea($paso['descripcion']); ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
<?php endif; ?>
    </div>
    <button type="button" id="agregar-paso" class="boton-primario">+ Agregar Nuevo Paso</button>

    <script>
    jQuery(document).ready(function($) {
        var pasoCount =                                               <?php echo count($pasos); ?>;

        // Función para actualizar números de paso
        function actualizarNumerosPasos() {
            $('.paso-item').each(function(index) {
                $(this).find('.paso-numero').text('Paso ' + (index + 1));
            });
        }

        // Agregar nuevo paso
        $('#agregar-paso').click(function() {
            pasoCount++;
            var nuevoPaso = `
                <div class="paso-item">
                    <div class="paso-header">
                        <span class="paso-numero">Paso ${pasoCount}</span>
                        <button type="button" class="eliminar-paso">Eliminar Paso</button>
                    </div>
                    <div class="campo-grid">
                        <div class="campo">
                            <label>Título del Paso:</label>
                            <input type="text" name="pasos_titulo[]" value="" placeholder="Ej: Contacta con nuestro equipo">
                        </div>
                        <div class="campo">
                            <label>Descripción:</label>
                            <textarea name="pasos_descripcion[]" placeholder="Describe este paso..."></textarea>
                        </div>
                    </div>
                </div>
            `;
            $('#pasos-container .empty-state').remove();
            $('#pasos-container').append(nuevoPaso);
            actualizarNumerosPasos();
        });

        // Eliminar paso
        $(document).on('click', '.eliminar-paso', function() {
            $(this).closest('.paso-item').remove();
            pasoCount--;
            actualizarNumerosPasos();

            // Mostrar estado vacío si no hay pasos
            if ($('.paso-item').length === 0) {
                $('#pasos-container').html('<div class="empty-state"><p>No hay pasos agregados. ¡Agrega tu primer paso!</p></div>');
            }
        });
    });
    </script>
    <?php
        }

        // Guardar datos del metabox
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
    ?>