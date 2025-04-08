<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\interfaces\Action;

class CustomTypesManager extends ActionManager
{
    private array $actions = [];
    public function __construct(private array $args)
    {}

    #[\Override]
    protected function create_action(array $action_args): Action
    {

        return new CustomType($action_args[0], $action_args[1]);
    }

    #[\Override]
    protected function add_actions(): void
    {
        foreach ($this->args as $type => $data) {
            $this->actions = [ ...$this->actions, $this->create_action([$type, $data])];
        }

    }

    #[\Override]
    public function run_actions(): void
    {
        foreach ($this->actions as $action) {
            $action->run();
        }
    }
}
