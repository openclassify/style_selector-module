<?php namespace Visiosoft\StyleSelectorModule\Style\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class StyleFormBuilder extends FormBuilder
{
    protected $skips = [];

    protected $actions = [
        'save'
    ];

    protected $buttons = [
        'cancel',
    ];


    protected $options = [
        'form_view' => 'visiosoft.module.style_selector::form'
    ];

    protected $sections = [];

    protected $assets = [];
}
