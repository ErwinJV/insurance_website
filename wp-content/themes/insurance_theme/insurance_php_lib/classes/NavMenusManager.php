<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\interfaces\Action;

class NavMenusManager extends ActionManager
{

    private array $actions = [];

    public function __construct
    (
        private array $args
    ) {
        $this->add_actions($args);
    }

    #[\Override]
    protected function add_actions(): void
    {
        foreach ($this->args as $key => $arg) {

            $this->actions = [ ...$this->actions, $this->create_action([$key, $arg])];
        }
    }

    #[\Override]
    protected function create_action(array $action_args): Action
    {

        return new NavMenu($action_args[0], $action_args[1]);

    }

    #[\Override]
    public function run_actions(): void
    {
        foreach ($this->actions as $action) {
            $action->run();
        }
    }
}
