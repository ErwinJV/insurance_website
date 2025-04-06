<?php
namespace insurance_php_lib\config;

class Config
{

    private array $config = [];

    public function __construct()
    {
        $this->config = [
            'version'   => wp_get_environment_type() === 'development' ? time() : INSURANCE_VERSION,
            'env'       => [
                'type' => wp_get_environment_type(),
                'mode' => false === strpos(INSURANCE_PATH, ABSPATH . 'wp-content/plugins') ? 'theme' : 'plugin',
            ],

            'manifest'  => [
                'path' => INSURANCE_ASSETS_PATH . '/.vite/manifest.json',
            ],
            'cache'     => [
                'path' => WP_CONTENT_DIR . '/cache/insurance',
            ],
            'resources' => [
                'path' => INSURANCE_PATH . '/src',
            ],
            'views'     => [
                'path' => INSURANCE_PATH . '/src/views',
            ],
            'assets'    => [
                'path' => INSURANCE_URI . '/dist/',
            ],
        ];
    }

    public function get(string $key): mixed
    {
        $value = $this->config;

        foreach (explode('.', $key) as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }

    public function isTheme(): bool
    {
        return 'theme' === $this->get('env.mode');
    }

    public function isPlugin(): bool
    {
        return 'plugin' === $this->get('env.mode');
    }
}
