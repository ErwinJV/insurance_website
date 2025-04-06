<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\classes\Script;
use insurance_php_lib\interfaces\Action;

final class ScriptsManager extends ActionManager
{
    private array $actions = [];

    public function __construct(
        private array $scripts_args,
    ) {
        $this->add_actions($scripts_args);
    }

    #[\Override]
    protected function create_action(array $action_args): Action
    {
        extract($action_args, EXTR_OVERWRITE);
        return new Script($type_script, $name, $path_uri, $deps, $version, $args);
    }

    #[\Override]
    protected function add_actions(): void
    {
        foreach ($this->scripts_args as $script_arg) {
            $this->actions = [ ...$this->actions, $this->create_action($script_arg)];
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
