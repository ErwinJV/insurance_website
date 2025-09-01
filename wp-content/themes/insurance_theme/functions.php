<?php
define('INSURANCE_VERSION', '1.0.0');
define('INSURANCE_PATH', get_template_directory());
define('INSURANCE_ROOT', str_replace(ABSPATH, '/', dirname(__DIR__, 1)));
define('INSURANCE_LIB', INSURANCE_PATH . '/insurance_php_lib');
define("INSURANCE_VIEWS_PATH", INSURANCE_LIB . "/views");
define("INSURANCE_COMPONENTS_PATH", INSURANCE_LIB . "/components");
define('INSURANCE_URI', get_template_directory_uri());

define('INSURANCE_ASSETS_PATH', INSURANCE_PATH . '/dist');
define('INSURANCE_ASSETS_URI', INSURANCE_URI . '/dist');
define('INSURANCE_RESOURCES_PATH', INSURANCE_PATH . '/src');
define('INSURANCE_RESOURCES_URI', INSURANCE_URI . '/src');

define('SITE_NAME', get_bloginfo('name'));

require INSURANCE_LIB . '/inc/bootstrap.php';

require INSURANCE_LIB . '/theme-support.php';

require INSURANCE_LIB . "/menus/advantages-menu.php";
require INSURANCE_LIB . "/menus/testimonials-menu.php";
require INSURANCE_LIB . "/menus/contact-section.php";

require INSURANCE_LIB . '/metaboxes/seguro-consejos-metabox.php';
require INSURANCE_LIB . '/metaboxes/seguro-beneficios-metabox.php';
require INSURANCE_LIB . '/metaboxes/seguro-como-funciona-metabox.php';
require INSURANCE_LIB . '/metaboxes/seguro-icono-metabox.php';

require INSURANCE_LIB . "/shortcodes/consejos-servicios-seguros.php";
require INSURANCE_LIB . "/shortcodes/seguro-beneficios.php";
require INSURANCE_LIB . "/shortcodes/seguro-como-funciona.php";
require INSURANCE_LIB . "/shortcodes/advantages-menu.php";
require INSURANCE_LIB . "/shortcodes/testimonials.php";
require INSURANCE_LIB . "/shortcodes/contact-section.php";

require INSURANCE_LIB . "/meta/meta.php";

function custom_404_redirect()
{
    if (is_404()) {
        include get_template_directory() . '/404.php';
        exit;
    }
}
add_action('template_redirect', 'custom_404_redirect');

function my_theme_disable_tailwind_in_editor()
{
    // Remover el estilo de Tailwind del editor
    remove_editor_styles();

    // Cargar solo estilos específicos para el editor
    add_editor_style('editor-styles.css');
}
add_action('after_setup_theme', 'my_theme_disable_tailwind_in_editor');
