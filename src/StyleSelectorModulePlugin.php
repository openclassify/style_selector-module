<?php namespace Visiosoft\StyleSelectorModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Illuminate\Support\Facades\DB;

class StyleSelectorModulePlugin extends Plugin
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'style_selector',
                function ($type, $default = null) {

                    $provider = $this->getValueByType($type);

                    return ($provider) ? $provider : $default;
                }
            )
        ];
    }

    public function getValueByType($type)
    {
        $setting = DB::table('settings_settings')
            ->where('key', 'visiosoft.module.style_selector::' . $type)
            ->first();

        return ($setting) ? $setting->value : null;
    }
}
