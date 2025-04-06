<?php
define('INSURANCE_VERSION', '1.0.0');
define('INSURANCE_PATH', get_template_directory());
define('INSURANCE_ROOT', str_replace(ABSPATH, '/', dirname(__DIR__, 1)));
define('INSURANCE_LIB', INSURANCE_PATH . '/insurance_php_lib');
define('INSURANCE_URI', get_template_directory_uri());

define('INSURANCE_ASSETS_PATH', INSURANCE_PATH . '/dist');
define('INSURANCE_ASSETS_URI', INSURANCE_URI . '/dist');
define('INSURANCE_RESOURCES_PATH', INSURANCE_PATH . '/src');
define('INSURANCE_RESOURCES_URI', INSURANCE_URI . '/src');

define('SITE_NAME', get_bloginfo('name'));

require INSURANCE_LIB . '/inc/bootstrap.php';
