<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;
use insurance_php_lib\traits\Assets;

class Script implements Action
{
    use Assets;

    public function __construct(
        public string $type_script,
        public string $name,
        public string $path_uri,
        public array $deps,
        public string | null $version,
        public array | bool $args
    ) {}

    private function add_scripts(): void
    {
        wp_enqueue_script($this->name, $this->get_asset($this->path_uri), $this->deps, $this->version, $this->args);
    }

    #[\Override]
    public function run(): void
    {
        switch ($this->type_script) {
            case 'back':
                add_action('admin_enqueue_scripts', $this->add_scripts(...));
                break;
            case 'front':
                add_action('wp_enqueue_scripts', $this->add_scripts(...));
                break;
        }

    }

}
