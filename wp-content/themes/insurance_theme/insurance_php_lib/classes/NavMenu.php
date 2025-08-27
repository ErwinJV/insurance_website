<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;

class NavMenu implements Action
{

    public function __construct(
        private string $location,
        private string $description
    ) {}

    public function run(): void
    {
        add_action('init', $this->add_menus(...));
    }

    private function add_menus()
    {
        register_nav_menu($this->location, __($this->description, SITE_NAME));
    }
}
