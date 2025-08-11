<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;

class ThemeSupport implements Action
{

    public function __construct(
        private array | string $arg
    ) {}

    private function add_theme_support()
    {
        if (is_array($this->arg)) {

            add_theme_support($this->arg[0], $this->arg[1]);
        } else {

            add_theme_support($this->arg);
        }

    }

    #[\Override]
    public function run(): void
    {
        add_action('after_setup_theme', $this->add_theme_support(...));

    }

}
