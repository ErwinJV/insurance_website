<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;

class ThemeSupport implements Action
{

    public function __construct(
        private array | string $arg
    ) {}

    #[\Override]
    public function run(): void
    {
        if (is_array($this->arg)) {
            add_theme_support(...$this->arg);
        } else {
            add_theme_support($this->arg);
        }
    }

}
