<?php
namespace insurance_php_lib\schema;

class Schema
{

    public static array $scripts_args = [

        [
            'type_script' => 'front',
            'name'        => 'insurance-main-script-js',
            'path_uri'    => 'src/main.ts',
            'deps'        => [],
            'version'     => '1.0',
            'args'        => ['strategy' => 'defer'],
            'is_cdn'      => false,
        ],
        [
            'type_script' => 'front',
            'name'        => 'flowbite-script-js',
            'path_uri'    => 'https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js',
            'deps'        => [],
            'version'     => '2.1.2',
            'args'        => ['strategy' => 'defer'],
            'is_cdn'      => true,
        ],

    ];

    public static array $styles_args = [
        [
            'type_script' => 'front',
            'name'        => 'insurance-main-style-css',
            'path_uri'    => 'src/css/style.css',
            'deps'        => [],
            'version'     => '1.0',
            'media'       => 'all',
            'is_cdn'      => false,

        ],
        [
            'type_script' => 'front',
            'name'        => 'flowbite-style-css',
            'path_uri'    => 'https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css',
            'deps'        => ['insurance-main-style-css'],
            'version'     => '3.1.2',
            'media'       => 'all',
            'is_cdn'      => true,

        ],

    ];

    public static array $nav_args = [
        'main_navigation'     => 'Main Navigation',
        'social_links'        => 'Social Links',
        'social_links_footer' => 'Social Links Footer',
    ];

    public static array $theme_support = [

        'post-thumbnails',
        'widgets',
        ['custom-logo', [
            'height'      => 100,
            'width'       => 300,

            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => [SITE_NAME, SITE_NAME . ' logo'],
        ],
        ],
    ];

}
