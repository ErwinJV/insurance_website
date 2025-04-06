<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;
use insurance_php_lib\traits\Assets;

class Style implements Action
{
    use Assets;

    public function __construct(
        public string $type_script,
        public string $name,
        public string $path_uri,
        public array $deps,
        public string $version,
        public string $media
    ) {}

    private function add_style(): void
    {
        wp_enqueue_style($this->name, $this->get_asset($this->path_uri), $this->deps, $this->version, $this->media);
    }

    #[\Override]
    public function run(): void
    {
        switch ($this->type_script) {
            case 'back':
                add_action('admin_enqueue_scripts', $this->add_style(...));
                break;
            case 'front':
                add_action('wp_enqueue_scripts', $this->add_style(...));
                break;
        }

    }
}
