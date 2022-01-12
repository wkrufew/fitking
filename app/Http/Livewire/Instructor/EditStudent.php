<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;

class EditStudent extends Component
{
    public $student, $valor;
    public $open = false;

    public function mount($student)
    {
        $this->student = $student;
    }
    public function render()
    {
        $this->valor = $this->student->profile()->exists();
        return view('livewire.instructor.edit-student');
    }
}
