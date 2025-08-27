<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\interfaces\Action;

class ThemeSupportManager extends ActionManager
{
    private array $actions = [];
    public function __construct(
        private array $args
    ) {

        $this->add_actions();
    }

    #[\Override]
    protected function add_actions(): void
    {
        foreach ($this->args as $arg) {
            $this->actions = [ ...$this->actions, $this->create_action($arg)];

        }
    }

    #[\Override]
    protected function create_action(array | string $action_args): Action
    {
        return new ThemeSupport($action_args);
    }

    #[\Override]
    public function run_actions(): void
    {
        foreach ($this->actions as $action) {
            $action->run();
        }
    }

}
