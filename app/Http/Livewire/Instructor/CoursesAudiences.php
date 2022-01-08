<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Audience;
use App\Models\Course;
use Livewire\Component;

class CoursesAudiences extends Component
{
    public $course, $audience, $name;

    protected $rules = [
        'audience.name' => 'required'
    ];

    protected $messages = [
        'audience.name.required' => 'El campo es requerido por favor ingresa un nombre'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->audience = new Audience();
    }
    public function render()
    {
        return view('livewire.instructor.courses-audiences');
    }

    public function store()
    {
        $rules = [
            'name' => 'required'
        ];
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa un nombre',
        ];

        $this->validate($rules, $messages);
        
        $this->course->audiences()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);

    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }

    public function update()
    {
        $this->validate();

        $this->audience->save();

        $this->audience = new Audience();

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();

        $this->course = Course::find($this->course->id);
    }
}
