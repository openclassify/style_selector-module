<?php namespace Visiosoft\StyleSelectorModule\Style\Form;

use Anomaly\SelectFieldType\SelectFieldType;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Illuminate\Support\Facades\DB;

class StyleFormFields
{
    public function handle(StyleFormBuilder $builder)
    {

        $selected_type_detail = DB::table('settings_settings')
            ->where('key','visiosoft.module.style_selector::detail')
            ->first();

        $builder->setFields([
            "detail" => [
                "type" => "anomaly.field_type.select",
                "label" => 'visiosoft.module.style_selector::field.detail_page',
                'inputView' => 'visiosoft.module.style_selector::field_type.preview_select',
                "config" => [
                    "handler" => function (SelectFieldType $fieldType, ExtensionCollection $extensions) {
                        $themes = $extensions->search('visiosoft.module.style_selector::provider.*')
                            ->pluck('thumbnail', 'namespace')->all();

                        $fieldType->setOptions(
                            array_merge(['default' => 'default'],$themes)
                        );
                    },
                    'default_value' => ($selected_type_detail && $selected_type_detail->value) ? $selected_type_detail->value : 'default',
                    "mode" => "radio",
                ]
            ]
        ]);
    }
}
