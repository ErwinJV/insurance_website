<?php
namespace insurance_php_lib\traits;

trait ValidFile
{

    private function validate(string $path): string
    {
        // $path = insurance_app()->config()->get('manifiest.path');

        if (! file_exists($path)) {
            wp_die(__("Requested file in path: {$path}  not found in the server", 'insurance'));
        }

        return $path;
    }

}
