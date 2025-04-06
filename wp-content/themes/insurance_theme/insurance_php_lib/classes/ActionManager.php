<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\interfaces\Action;

abstract class ActionManager
{
    abstract protected function create_action(array $action_args): Action;
    abstract protected function add_actions(): void;
    abstract public function run_actions(): void;
}
