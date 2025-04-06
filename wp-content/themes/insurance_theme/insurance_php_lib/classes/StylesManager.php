<?php
namespace insurance_php_lib\classes;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\classes\Style;
use insurance_php_lib\interfaces\Action;

final class StylesManager extends ActionManager
{
    private array $actions = [];

    public function __construct(
        private array $styles_args,
    ) {
        $this->add_actions($styles_args);
    }

    #[\Override]
    protected function create_action(array $action_args): Action
    {
        extract($action_args, EXTR_OVERWRITE);
        return new Style($type_script, $name, $path_uri, $deps, $version, $media);
    }

    #[\Override]
    protected function add_actions(): void
    {
        foreach ($this->styles_args as $style_arg) {
            $this->actions = [ ...$this->actions, $this->create_action($style_arg)];
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
