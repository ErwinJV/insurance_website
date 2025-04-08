<?php
namespace insurance_php_lib\schema;

class Schema
{

    public static array $scripts_args = [

        [
            'type_script' => 'front',
            'name'        => 'insurance_main_script-js',
            'path_uri'    => 'src/main.ts',
            'deps'        => [],
            'version'     => '1.0',
            'args'        => ['strategy' => 'defer'],
        ],
    ];

    public static array $styles_args = [
        [
            'type_script' => 'front',
            'name'        => 'insurance_main_style-css',
            'path_uri'    => 'src/css/style.css',
            'deps'        => [],
            'version'     => '1.0',
            'media'       => 'all',
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
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => [SITE_NAME, SITE_NAME . ' logo'],
        ],
        ],
    ];

}
