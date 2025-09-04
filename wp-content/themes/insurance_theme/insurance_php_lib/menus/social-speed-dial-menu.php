<?php
// Agregar menú de administración para el speed dial
add_action('admin_menu', 'speed_dial_menu');

function speed_dial_menu() {
    add_menu_page(
        'Configuración del Speed Dial',
        'Speed Dial',
        'manage_options',
        'speed-dial',
        'speed_dial_admin_page',
        'dashicons-share',
        30
    );
}

// Página de administración
function speed_dial_admin_page() {
    // Guardar configuración
    if (isset($_POST['speed_dial_nonce']) && wp_verify_nonce($_POST['speed_dial_nonce'], 'guardar_speed_dial')) {
        update_option('speed_dial_whatsapp', sanitize_text_field($_POST['whatsapp']));
        update_option('speed_dial_instagram', sanitize_text_field($_POST['instagram']));
        update_option('speed_dial_facebook', sanitize_text_field($_POST['facebook']));
        update_option('speed_dial_telefono', sanitize_text_field($_POST['telefono']));
        update_option('speed_dial_email', sanitize_text_field($_POST['email']));
        echo '<div class="notice notice-success is-dismissible"><p>Configuración guardada correctamente.</p></div>';
    }

    // Obtener valores actuales
    $whatsapp = get_option('speed_dial_whatsapp', '');
    $instagram = get_option('speed_dial_instagram', '');
    $facebook = get_option('speed_dial_facebook', '');
    $telefono = get_option('speed_dial_telefono', '');
    $email = get_option('speed_dial_email', '');
    ?>
    
    <div class="wrap speed-dial-admin-wrap">
        <style>
            .speed-dial-admin-wrap {
                max-width: 800px;
                margin: 20px auto;
                background: #f6f7f7;
                border: 1px solid #ccd0d4;
                border-radius: 4px;
                padding: 20px;
            }
            
            .speed-dial-admin-wrap h1 {
                color: #1e293b;
                font-size: 28px;
                margin-top: 0;
                padding-bottom: 15px;
                border-bottom: 1px solid #dcdcde;
            }
            
            .speed-dial-admin-field {
                margin-bottom: 20px;
            }
            
            .speed-dial-admin-field label {
                display: block;
                font-weight: 600;
                margin-bottom: 5px;
                color: #1d2327;
            }
            
            .speed-dial-admin-field input[type="text"],
            .speed-dial-admin-field input[type="url"],
            .speed-dial-admin-field input[type="tel"],
            .speed-dial-admin-field input[type="email"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #8c8f94;
                border-radius: 4px;
                font-size: 14px;
                background: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset;
            }
            
            .speed-dial-admin-field input:focus {
                border-color: #2271b1;
                box-shadow: 0 0 0 1px #2271b1;
                outline: 2px solid transparent;
            }
            
            .speed-dial-admin-field .description {
                font-size: 13px;
                color: #646970;
                margin-top: 5px;
                font-style: italic;
            }
            
            @media (max-width: 768px) {
                .speed-dial-admin-wrap {
                    padding: 15px;
                    margin: 10px;
                }
            }
        </style>

        <h1>Configuración del Speed Dial</h1>
        <form method="post">
            <?php wp_nonce_field('guardar_speed_dial', 'speed_dial_nonce'); ?>
            
            <div class="speed-dial-admin-field">
                <label for="whatsapp">Enlace de WhatsApp</label>
                <input type="url" id="whatsapp" name="whatsapp" value="<?php echo esc_attr($whatsapp); ?>" placeholder="https://wa.me/1234567890">
                <p class="description">Ingrese el enlace completo de WhatsApp (ej: https://wa.me/1234567890)</p>
            </div>
            
            <div class="speed-dial-admin-field">
                <label for="instagram">Enlace de Instagram</label>
                <input type="url" id="instagram" name="instagram" value="<?php echo esc_attr($instagram); ?>" placeholder="https://instagram.com/usuario">
                <p class="description">Ingrese el enlace completo de Instagram</p>
            </div>
            
            <div class="speed-dial-admin-field">
                <label for="facebook">Enlace de Facebook</label>
                <input type="url" id="facebook" name="facebook" value="<?php echo esc_attr($facebook); ?>" placeholder="https://facebook.com/usuario">
                <p class="description">Ingrese el enlace completo de Facebook</p>
            </div>
            
            <div class="speed-dial-admin-field">
                <label for="telefono">Número de Teléfono</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo esc_attr($telefono); ?>" placeholder="+1234567890">
                <p class="description">Ingrese el número de teléfono completo con código de país</p>
            </div>
            
            <div class="speed-dial-admin-field">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" placeholder="email@ejemplo.com">
                <p class="description">Ingrese la dirección de correo electrónico</p>
            </div>
            
            <?php submit_button('Guardar Cambios', 'primary', 'submit'); ?>
        </form>
    </div>
    <?php
}
