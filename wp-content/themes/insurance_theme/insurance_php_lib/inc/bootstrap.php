<?php

require INSURANCE_PATH . '/vendor/autoload.php';
require INSURANCE_LIB . '/inc/autoload.php';

if (! function_exists('insurance_app')) {
    function insurance_app(): insurance_php_lib\App
    {
        return insurance_php_lib\App::get();
    }
}

insurance_app();
