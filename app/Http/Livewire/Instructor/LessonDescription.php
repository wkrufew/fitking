<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Description;
use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public $lesson, $description, $name;

    protected $rules = [
        'description.name' => 'required'
    ];

    protected $messages = [
        'description.name.required' => 'Este campo es requerido por favor ingresa una descripcion'
    ];

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;

        if ($lesson->description) {
            $this->description = $lesson->description;
        }
    }
    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }

    public function store()
    {
        $rules = [
            'name' => 'required'           
        ];
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa una descripcion'
        ];

        $this->validate($rules, $messages);

        //guarda el registro en la propiedad description
        $this->description = $this->lesson->description()->create([
            'name' => $this->name
        ]);
        
        //esto ayuda a resetear las variables
        $this->reset(['name']);

        //actualiza la informacion de la leccion
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function update()
    {
        $this->validate();

        $this->description->save();
    }

    public function destroy()
    {
        $this->description->delete();

        //resetea la propiedad description
        $this->reset('description');

        //actualizamos la informacion de la leccion actual
        $this->lesson = Lesson::find($this->lesson->id);
    }
}
