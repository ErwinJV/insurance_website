<?php
namespace insurance_php_lib;

use insurance_php_lib\classes\ActionManager;
use insurance_php_lib\classes\CustomTypesManager;
use insurance_php_lib\classes\NavMenusManager;
use insurance_php_lib\classes\ScriptsManager;
use insurance_php_lib\classes\StylesManager;
use insurance_php_lib\classes\ThemeSupportManager;
use insurance_php_lib\config\Config;
use insurance_php_lib\schema\Schema;

class App
{
    public static ?App $instance = null;

    private Config $config;

    public function __construct(
        private readonly Schema $schema
    ) {
        $this->config = new Config();

        $this->init(new ScriptsManager(Schema::$scripts_args));
        $this->init(new StylesManager(Schema::$styles_args));
        $this->init(new NavMenusManager(Schema::$nav_args));

        $this->init(new ThemeSupportManager(Schema::$theme_support));

        $this->init(new CustomTypesManager(Schema::$custom_types));
    }

    public function config(): Config
    {
        return $this->config;
    }

    public static function get(): App
    {
        if (empty(self::$instance)) {
            self::$instance = new App(new Schema());
        }

        return self::$instance;
    }

    private function init(ActionManager $actionManager): void
    {
        $actionManager->run_actions();

    }

}
