<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DynamicFormField extends Component
{
    public $type;
    public $name;
    public $label;
    public $value;
    public $placeholder;
    public $required;

    /**
     * Create a new component instance.
     * @param string type type
     * @param string name name
     * @param string label label
     * @param string value value
     * @param string placeholder placeholder
     * @param string required required
     *
     * @return void
     */
    public function __construct($type, $name, $label, $value, $placeholder = '',$required=false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = ['name' => $this->name, 'label' => $this->label, 'value' => $this->value, 'placeholder' => $this->placeholder, 'required' => $this->required];
        switch($this->type) {
            case 'text': 
                    $params['type'] = 'text';
                break;
            case 'email':
                    $params['type'] = 'email';
                break;
            case 'checkbox':
                break;
            case 'select':
                break;
            case 'file':
                break;
            case 'htmleditor':
                break;
        }

        return view('components.dynamic-form-field', $params);

        // if ($this->type === 'text') {
        //     return view('components.dynamic-form-field', ['type' => 'text', 'name' => $this->name, 'label' => $this->label, 'value' => $this->value]);
        // } else if ($this->type === 'email') {
        //     return view('components.dynamic-form-field', ['type' => 'email', 'name' => $this->name, 'label' => $this->label, 'value' => $this->value]);
        // } else {
        //     return '';
        // }
    }
}
