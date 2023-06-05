<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{
    public $tasks, $slug, $title, $description, $icon, $url, $task_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->tasks = Task::all();
        return view('livewire.tasks.index');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->slug = '';
        $this->title = '';
        $this->description = '';
        $this->icon = '';
        $this->url = '';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
            // 'icon' => 'required',
            // 'url' => 'required',
        ]);
   
        Task::updateOrCreate(['id' => $this->task_id], [
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'url' => $this->url
        ]);
  
        session()->flash('message', 
            $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = Task::findOrFail($id);
        $this->task_id = $id;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->icon = $product->icon;
        $this->url = $product->url;
    
        $this->openModal();
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }    
}
