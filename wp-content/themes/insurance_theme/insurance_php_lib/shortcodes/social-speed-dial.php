<?php

// Shortcode para mostrar el speed dial
function speed_dial_shortcode() {
    $whatsapp = get_option('speed_dial_whatsapp', '');
    $instagram = get_option('speed_dial_instagram', '');
    $facebook = get_option('speed_dial_facebook', '');
    $telefono = get_option('speed_dial_telefono', '');
    $email = get_option('speed_dial_email', '');

    ob_start();
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <div class="fixed bottom-6 right-6 z-50 group ">
        <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
            <?php if ($whatsapp): ?>
                <a href="<?php echo esc_url($whatsapp); ?>" target="_blank" class="flex justify-center items-center w-12 h-12 text-white bg-green-500 rounded-full border border-gray-200 shadow-sm hover:bg-green-600 focus:ring-4 focus:ring-green-300 focus:outline-none transition-all duration-200">
                    <i class="fab fa-whatsapp text-xl"></i>
                    <span class="sr-only">WhatsApp</span>
                </a>
            <?php endif; ?>
            
            <?php if ($instagram): ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="flex justify-center items-center w-12 h-12 text-white bg-pink-600 rounded-full border border-gray-200 shadow-sm hover:bg-pink-700 focus:ring-4 focus:ring-pink-300 focus:outline-none transition-all duration-200">
                    <i class="fab fa-instagram text-xl"></i>
                    <span class="sr-only">Instagram</span>
                </a>
            <?php endif; ?>
            
            <?php if ($facebook): ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="flex justify-center items-center w-12 h-12 text-white bg-blue-600 rounded-full border border-gray-200 shadow-sm hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-all duration-200">
                    <i class="fab fa-facebook-f text-xl"></i>
                    <span class="sr-only">Facebook</span>
                </a>
            <?php endif; ?>
            
            <?php if ($telefono): ?>
                <a href="tel:<?php echo esc_attr($telefono); ?>" class="flex justify-center items-center w-12 h-12 text-white bg-gray-800 rounded-full border border-gray-200 shadow-sm hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 focus:outline-none transition-all duration-200">
                    <i class="fas fa-phone text-xl"></i>
                    <span class="sr-only">Teléfono</span>
                </a>
            <?php endif; ?>
            
            <?php if ($email): ?>
                <a href="mailto:<?php echo esc_attr($email); ?>" class="flex justify-center items-center w-12 h-12 text-white bg-red-500 rounded-full border border-gray-200 shadow-sm hover:bg-red-600 focus:ring-4 focus:ring-red-300 focus:outline-none transition-all duration-200">
                    <i class="fas fa-envelope text-xl"></i>
                    <span class="sr-only">Correo</span>
                </a>
            <?php endif; ?>
        </div>
        
        <button type="button" id="speed-dial-button" class="flex items-center justify-center w-14 h-14 text-white bg-orange-600 rounded-full hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-all duration-200">
            <i class="fas fa-plus text-xl transition-transform group-hover:rotate-45"></i>
            <span class="sr-only">Abrir acciones</span>
        </button>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('speed-dial-button');
        const menu = document.getElementById('speed-dial-menu-default');
        
        button.addEventListener('click', function() {
            menu.classList.toggle('hidden');
            const expanded = button.getAttribute('aria-expanded') === 'true' || false;
            button.setAttribute('aria-expanded', !expanded);
        });
        
        // Cerrar el menú al hacer clic fuera de él
        document.addEventListener('click', function(event) {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('speed_dial', 'speed_dial_shortcode');
