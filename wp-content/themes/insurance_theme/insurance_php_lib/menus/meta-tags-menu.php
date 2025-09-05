<?php
// Agregar menú de administración para meta tags
add_action('admin_menu', 'meta_tags_menu');

function meta_tags_menu() {
    add_menu_page(
        'Configuración de Meta Tags',
        'Meta Tags',
        'manage_options',
        'meta-tags',
        'meta_tags_admin_page',
        'dashicons-share',
        35
    );
}

// Página de administración
function meta_tags_admin_page() {
    // Guardar configuración
    if (isset($_POST['meta_tags_nonce']) && wp_verify_nonce($_POST['meta_tags_nonce'], 'guardar_meta_tags')) {
        update_option('meta_titulo', sanitize_text_field($_POST['titulo']));
        update_option('meta_descripcion', sanitize_textarea_field($_POST['descripcion']));
        
        // Procesar imagen del icono
        if (!empty($_POST['meta_icono_id'])) {
            $image_id = intval($_POST['meta_icono_id']);
            $image_url = wp_get_attachment_url($image_id);
            update_option('meta_icono_id', $image_id);
            update_option('meta_icono', $image_url);
        } elseif (isset($_POST['eliminar_icono']) && $_POST['eliminar_icono'] == 1) {
            delete_option('meta_icono_id');
            delete_option('meta_icono');
        }
        
        echo '<div class="notice notice-success is-dismissible"><p>Configuración guardada correctamente.</p></div>';
    }

    // Obtener valores actuales
    $titulo = get_option('meta_titulo', get_bloginfo('name'));
    $descripcion = get_option('meta_descripcion', get_bloginfo('description'));
    $icono_id = get_option('meta_icono_id', '');
    $icono = get_option('meta_icono', '');
    
    // Asegurarse de que WordPress carga los scripts necesarios para la biblioteca de medios
    wp_enqueue_media();
    ?>
    
    <div class="wrap meta-tags-admin-wrap">
        <style>
            .meta-tags-admin-wrap {
                max-width: 800px;
                margin: 20px auto;
                background: #f6f7f7;
                border: 1px solid #ccd0d4;
                border-radius: 4px;
                padding: 20px;
            }
            
            .meta-tags-admin-wrap h1 {
                color: #1e293b;
                font-size: 28px;
                margin-top: 0;
                padding-bottom: 15px;
                border-bottom: 1px solid #dcdcde;
            }
            
            .meta-tags-admin-field {
                margin-bottom: 20px;
            }
            
            .meta-tags-admin-field label {
                display: block;
                font-weight: 600;
                margin-bottom: 5px;
                color: #1d2327;
            }
            
            .meta-tags-admin-field input[type="text"],
            .meta-tags-admin-field textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #8c8f94;
                border-radius: 4px;
                font-size: 14px;
                background: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            }
            
            .meta-tags-admin-field input:focus,
            .meta-tags-admin-field textarea:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }
            
            .meta-tags-admin-field .description {
                font-size: 13px;
                color: #646970;
                margin-top: 5px;
                font-style: italic;
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
                .meta-tags-admin-wrap {
                    padding: 15px;
                    margin: 10px;
                }
            }
        </style>

        <script>
        jQuery(document).ready(function($) {
            // Variables para la biblioteca de medios (icono)
            var frame_icono;
            var imageIconoIdInput = $("#meta_icono_id");
            var imageIconoPreview = $("#image-icono-preview");
            var removeIconoButton = $("#remove-image-icono-button");
            
            // Abrir la biblioteca de medios al hacer clic en el botón (icono)
            $("#upload-image-icono-button").on("click", function(e) {
                e.preventDefault();
                
                // Si ya existe el frame, ábrelo
                if (frame_icono) {
                    frame_icono.open();
                    return;
                }
                
                // Crear un nuevo frame
                frame_icono = wp.media({
                    title: "Seleccionar icono",
                    button: {
                        text: "Usar esta imagen"
                    },
                    multiple: false
                });
                
                // Cuando se selecciona una imagen
                frame_icono.on("select", function() {
                    var attachment = frame_icono.state().get("selection").first().toJSON();
                    imageIconoIdInput.val(attachment.id);
                    imageIconoPreview.attr("src", attachment.url).show();
                    removeIconoButton.show();
                });
                
                // Abrir el frame
                frame_icono.open();
            });
            
            // Eliminar la imagen de icono seleccionada
            removeIconoButton.on("click", function(e) {
                e.preventDefault();
                if (confirm("¿Estás seguro de que quieres eliminar el icono?")) {
                    imageIconoIdInput.val("");
                    imageIconoPreview.attr("src", "").hide();
                    $(this).hide();
                }
            });
        });
        </script>

        <h1>Configuración de Meta Tags para Redes Sociales</h1>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('guardar_meta_tags', 'meta_tags_nonce'); ?>
            
            <div class="meta-tags-admin-field">
                <label for="titulo">Título de la página</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo esc_attr(stripslashes($titulo)); ?>" placeholder="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <p class="description">Título que aparecerá cuando se comparta la página en redes sociales</p>
            </div>
            
            <div class="meta-tags-admin-field">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="<?php echo esc_attr(get_bloginfo('description')); ?>"><?php echo esc_textarea(stripslashes($descripcion)); ?></textarea>
                <p class="description">Descripción que aparecerá cuando se comparta la página en redes sociales</p>
            </div>
            
            <div class="meta-tags-admin-field">
                <label>Icono para redes sociales</label>
                <div class="media-button-wrapper">
                    <button type="button" id="upload-image-icono-button" class="button">Seleccionar desde la biblioteca</button>
                    <input type="hidden" id="meta_icono_id" name="meta_icono_id" value="<?php echo esc_attr($icono_id); ?>">
                </div>
                
                <div class="image-preview-container">
                    <?php if ($icono): ?>
                        <div class="image-preview">
                            <img id="image-icono-preview" src="<?php echo esc_url($icono); ?>" alt="Vista previa del icono">
                        </div>
                        <button type="button" id="remove-image-icono-button" class="remove-image-button">Eliminar icono</button>
                    <?php else: ?>
                        <div class="image-preview">
                            <img id="image-icono-preview" src="" alt="Vista previa del icono" style="display: none;">
                        </div>
                        <button type="button" id="remove-image-icono-button" class="remove-image-button" style="display: none;">Eliminar icono</button>
                    <?php endif; ?>
                </div>
                <p class="description">Icono que aparecerá cuando se comparta la página en redes sociales. Tamaño recomendado: 1200x630px</p>
            </div>
            
            <?php submit_button('Guardar Cambios', 'primary', 'submit'); ?>
        </form>
    </div>
    <?php
}