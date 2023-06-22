<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FormFields;
use App\Models\Position;
use App\Models\Project;

class FormField extends Component
{
    use WithFileUploads;

    public $file;
        
    public $field_id, $type, $name, $title, $default_value, $description;

    public function render()
    {
        $form_field = FormFields::where('id',$this->field_id)->first();
        $data = [];
        $column = '';
        
        switch ($form_field->type) {
            case 'select':
                if ($form_field->name == 'position')
                {
                    $data = Position::all();
                    $column = 'slug';
                }
                if ($form_field->name == 'project') 
                {
                    $data = Project::all();
                    $column = 'name';
                }
                break;
            
            default:
                # code...
                break;
        }

        return view('livewire.forms.fields.'.$form_field->type,[
            'attributes' => [
                'type' => $form_field->type,
                'name' => $form_field->name,
                'title' => $form_field->title,
                'placeholder' => $form_field->default_value,
                'column' => $column
            ],
            'data' => $data,
        ]);
    }

    public function save()
    {
        // $this->validate([
        //     'photo' => 'image|max:1024', // 1MB Max
        // ]);
 
        $this->file->store('files');
    }
}
