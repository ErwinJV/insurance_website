<?php
namespace insurance_php_lib\traits;

trait Assets
{

    use ValidFile;

    public function get_asset($path): string
    {
        if (explode('/', $path)[0] !== 'src') {
            return self::validate($path);
        }

        $manifiest_path = insurance_app()->config()->get('manifest.path');
        if (! $manifiest_path) {
            wp_die("Config value $manifiest_path is empty");
        }
        $manifiest_path = self::validate($manifiest_path);
        $manifiest_json = json_decode(file_get_contents($manifiest_path), true);

        if (! $manifiest_json[$path]) {
            wp_die("Undefined manifiest.json object key: $path");
        }

        $asset_path = insurance_app()->config()->get('assets.path') . $manifiest_json[$path]['file'];
        return $asset_path;
    }
}
