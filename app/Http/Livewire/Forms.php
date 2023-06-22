<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Form;
use App\Models\FormsFields;
use App\Models\FormFields;



class Forms extends Component
{

    public $name;
    public $formFields;

    
    public function render()
    {
        // get form id by name
        $form_id = Form::where('name', $this->name)->first()->id;
        $form_fields = [];
        // get forms fields
        $forms_fields = FormsFields::where('form_id', $form_id)->orderBy('priority', 'asc')->get();
        // get form fields
        foreach ($forms_fields as $form_field) {
            $form_fields[] = $form_field->field_id;
        }
        $this->formFields = $form_fields;

        return view('livewire.forms.index', [
            'fields' => $form_fields
        ]);
    }

}
