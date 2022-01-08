<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use AuthorizesRequests;

    use WithPagination; 

    public $course, $search;
    //para eliminar matricula del uduario
    public $user_id;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->authorize('dicatated',$course);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(6);
        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor', ['course' => $this->course]);
    }

    public function baja(User $user)
    {
        //trae el id del usuario
        $this->user_id = $user;
        
        $curso = Course::find($this->course->id);
        $curso->students()->detach($this->user_id); 
        
        //$curso->students()->updateExistingPivot($this->user_id, ['estado' => 0]);

    }
}
