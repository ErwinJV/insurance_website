<?php
// Agregar menú de administración para la sección hero
add_action('admin_menu', 'hero_editable_menu');

function hero_editable_menu() {
    add_menu_page(
        'Configuración de Hero',
        'Sección Hero',
        'manage_options',
        'hero-editable',
        'hero_editable_admin',
        'dashicons-cover-image',
        25
    );
}

// Página de administración
function hero_editable_admin() {
    // Guardar configuración si se envió el formulario
    if (isset($_POST['hero_nonce']) && wp_verify_nonce($_POST['hero_nonce'], 'guardar_hero')) {
        update_option('hero_titulo', sanitize_text_field($_POST['titulo']));
        update_option('hero_subtitulo', sanitize_textarea_field($_POST['subtitulo']));
        update_option('hero_boton1_texto', sanitize_text_field($_POST['boton1_texto']));
        update_option('hero_boton1_enlace', sanitize_text_field($_POST['boton1_enlace']));
        update_option('hero_boton2_texto', sanitize_text_field($_POST['boton2_texto']));
        update_option('hero_boton2_enlace', sanitize_text_field($_POST['boton2_enlace']));
        update_option('hero_experiencia_texto', sanitize_text_field($_POST['experiencia_texto']));
        update_option('hero_experiencia_descripcion', sanitize_text_field($_POST['experiencia_descripcion']));
        
        // Procesar imagen de fondo
        if (!empty($_POST['imagen_fondo_id'])) {
            $image_id = intval($_POST['imagen_fondo_id']);
            $image_url = wp_get_attachment_url($image_id);
            update_option('hero_imagen_fondo_id', $image_id);
            update_option('hero_imagen_fondo', $image_url);
        } elseif (isset($_POST['eliminar_imagen_fondo']) && $_POST['eliminar_imagen_fondo'] == 1) {
            delete_option('hero_imagen_fondo_id');
            delete_option('hero_imagen_fondo');
        }
        
        echo '<div class="notice notice-success is-dismissible"><p>Configuración guardada correctamente.</p></div>';
    }
    
    // Obtener valores actuales
    $titulo = get_option('hero_titulo', 'Protege a tu <span class="highlight-text">familia</span> con los mejores seguros');
    $subtitulo = get_option('hero_subtitulo', 'Más de 15 años ayudando a familias y empresas a proteger lo que más valoran. Con soluciones personalizadas y atención dedicada, Elvis Jiménez te ofrece la tranquilidad que mereces.');
    $boton1_texto = get_option('hero_boton1_texto', 'Solicitar asesoría');
    $boton1_enlace = get_option('hero_boton1_enlace', '#contacto');
    $boton2_texto = get_option('hero_boton2_texto', 'Ver servicios');
    $boton2_enlace = get_option('hero_boton2_enlace', '#servicios');
    $experiencia_texto = get_option('hero_experiencia_texto', '15 años');
    $experiencia_descripcion = get_option('hero_experiencia_descripcion', 'De experiencia');
    $imagen_fondo_id = get_option('hero_imagen_fondo_id', '');
    $imagen_fondo = get_option('hero_imagen_fondo', '');
    
    // Asegurarse de que WordPress carga los scripts necesarios para la biblioteca de medios
    wp_enqueue_media();
    ?>
    
    <div class="wrap hero-admin-wrap">
        <style>
            .hero-admin-wrap {
                max-width: 1200px;
                margin: 20px auto;
            }
            
            .hero-admin-header {
                border-bottom: 1px solid #e2e8f0;
                padding-bottom: 20px;
                margin-bottom: 25px;
            }
            
            .hero-admin-header h1 {
                color: #1e293b;
                font-size: 28px;
                margin: 0;
            }
            
            .hero-admin-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
                gap: 20px;
                margin-bottom: 30px;
            }
            
            .hero-admin-card {
                background: #f6f7f7;
                border: 1px solid #ccd0d4;
                border-radius: 4px;
                padding: 15px 20px;
            }
            
            .hero-admin-card h3 {
                margin-top: 0;
                color: #1e293b;
                font-size: 18px;
                padding-bottom: 10px;
                border-bottom: 1px solid #dcdcde;
            }
            
            .hero-admin-field {
                margin-bottom: 15px;
            }
            
            .hero-admin-field label {
                display: block;
                font-weight: 600;
                margin-bottom: 5px;
                color: #1d2327;
            }
            
            .hero-admin-field input[type="text"],
            .hero-admin-field input[type="url"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #8c8f94;
                border-radius: 4px;
                font-size: 14px;
                background: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            }
            
            .hero-admin-field input[type="text"]:focus,
            .hero-admin-field input[type="url"]:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }
            
            .hero-admin-field textarea {
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
            
            .hero-admin-field textarea:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }
            
            .hero-admin-field .description {
                font-size: 13px;
                color: #646970;
                margin-top: 5px;
                font-style: italic;
            }
            
            .hero-admin-submit {
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
                .hero-admin-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        
        <script>
        jQuery(document).ready(function($) {
            // Variables para la biblioteca de medios (imagen de fondo)
            var frame_fondo;
            var imageFondoIdInput = $("#imagen_fondo_id");
            var imageFondoPreview = $("#image-fondo-preview");
            var removeFondoButton = $("#remove-image-fondo-button");
            
            // Abrir la biblioteca de medios al hacer clic en el botón (fondo)
            $("#upload-image-fondo-button").on("click", function(e) {
                e.preventDefault();
                
                // Si ya existe el frame, ábrelo
                if (frame_fondo) {
                    frame_fondo.open();
                    return;
                }
                
                // Crear un nuevo frame
                frame_fondo = wp.media({
                    title: "Seleccionar imagen de fondo",
                    button: {
                        text: "Usar esta imagen"
                    },
                    multiple: false
                });
                
                // Cuando se selecciona una imagen
                frame_fondo.on("select", function() {
                    var attachment = frame_fondo.state().get("selection").first().toJSON();
                    imageFondoIdInput.val(attachment.id);
                    imageFondoPreview.attr("src", attachment.url).show();
                    removeFondoButton.show();
                });
                
                // Abrir el frame
                frame_fondo.open();
            });
            
            // Eliminar la imagen de fondo seleccionada
            removeFondoButton.on("click", function(e) {
                e.preventDefault();
                if (confirm("¿Estás seguro de que quieres eliminar la imagen de fondo?")) {
                    imageFondoIdInput.val("");
                    imageFondoPreview.attr("src", "").hide();
                    $(this).hide();
                }
            });
        });
        </script>
        
        <div class="hero-admin-header">
            <h1>Configuración de la Sección Hero</h1>
        </div>
        
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('guardar_hero', 'hero_nonce'); ?>
            
            <div class="hero-admin-grid">
                <div class="hero-admin-card">
                    <h3>Contenido Principal</h3>
                    
                    <div class="hero-admin-field">
                        <label for="titulo">Título principal</label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo esc_attr(stripslashes($titulo)); ?>">
                        <p class="description">Use &lt;span class="highlight-text"&gt;texto&lt;/span&gt; para resaltar en azul</p>
                    </div>
                    
                    <div class="hero-admin-field">
                        <label for="subtitulo">Subtítulo</label>
                        <textarea id="subtitulo" name="subtitulo" rows="4"><?php echo esc_textarea(stripslashes($subtitulo)); ?></textarea>
                    </div>
                </div>
                
                <div class="hero-admin-card">
                    <h3>Botones</h3>
                    
                    <div class="hero-admin-field">
                        <label for="boton1_texto">Texto del primer botón</label>
                        <input type="text" id="boton1_texto" name="boton1_texto" value="<?php echo esc_attr(stripslashes($boton1_texto)); ?>">
                    </div>
                    
                    <div class="hero-admin-field">
                        <label for="boton1_enlace">Enlace del primer botón</label>
                        <input type="url" id="boton1_enlace" name="boton1_enlace" value="<?php echo esc_attr(stripslashes($boton1_enlace)); ?>">
                    </div>
                    
                    <div class="hero-admin-field">
                        <label for="boton2_texto">Texto del segundo botón</label>
                        <input type="text" id="boton2_texto" name="boton2_texto" value="<?php echo esc_attr(stripslashes($boton2_texto)); ?>">
                    </div>
                    
                    <div class="hero-admin-field">
                        <label for="boton2_enlace">Enlace del segundo botón</label>
                        <input type="url" id="boton2_enlace" name="boton2_enlace" value="<?php echo esc_attr(stripslashes($boton2_enlace)); ?>">
                    </div>
                </div>
                
                <div class="hero-admin-card">
                    <h3>Elemento Decorativo</h3>
                    
                    <div class="hero-admin-field">
                        <label for="experiencia_texto">Texto de experiencia</label>
                        <input type="text" id="experiencia_texto" name="experiencia_texto" value="<?php echo esc_attr(stripslashes($experiencia_texto)); ?>">
                    </div>
                    
                    <div class="hero-admin-field">
                        <label for="experiencia_descripcion">Descripción de experiencia</label>
                        <input type="text" id="experiencia_descripcion" name="experiencia_descripcion" value="<?php echo esc_attr(stripslashes($experiencia_descripcion)); ?>">
                    </div>
                </div>
                
                <div class="hero-admin-card">
                    <h3>Imagen de Fondo</h3>
                    
                    <div class="hero-admin-field">
                        <label>Seleccionar imagen de fondo</label>
                        <div class="media-button-wrapper">
                            <button type="button" id="upload-image-fondo-button" class="button">Seleccionar desde la biblioteca</button>
                            <input type="hidden" id="imagen_fondo_id" name="imagen_fondo_id" value="<?php echo esc_attr($imagen_fondo_id); ?>">
                        </div>
                        
                        <div class="image-preview-container">
                            <?php if ($imagen_fondo): ?>
                                <div class="image-preview">
                                    <img id="image-fondo-preview" src="<?php echo esc_url($imagen_fondo); ?>" alt="Vista previa">
                                </div>
                                <button type="button" id="remove-image-fondo-button" class="remove-image-button">Eliminar imagen</button>
                            <?php else: ?>
                                <div class="image-preview">
                                    <img id="image-fondo-preview" src="" alt="Vista previa" style="display: none;">
                                </div>
                                <button type="button" id="remove-image-fondo-button" class="remove-image-button" style="display: none;">Eliminar imagen</button>
                            <?php endif; ?>
                        </div>
                        <p class="description">Imagen de fondo para la sección hero. Tamaño recomendado: 1920x1080px</p>
                    </div>
                </div>
            </div>
            
            <div class="hero-admin-submit">
                <?php submit_button('Guardar Cambios', 'primary', 'submit'); ?>
            </div>
        </form>
    </div>
    <?php
}