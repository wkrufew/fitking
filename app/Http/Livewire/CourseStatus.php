<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $plan, $current;

    public function mount(Course $plan)
    {
        $this->plan = $plan;
        foreach ($plan->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
        if (!$this->current) {
            $this->current = $plan->lessons->last();
        }
        $this->authorize('enrolled', $plan);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Metodos 

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function completed()
    {
        if ($this->current->completed) {
            //eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);

        $this->plan = Course::find($this->plan->id);
    }

    //Propiedades computadas

    public function getIndexProperty()
    {
        return $this->plan->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty()
    {
        if($this->index == 0){
            return null;
        }else{
            return $this->plan->lessons[$this->index - 1];
        }
    }
    public function getNextProperty()
    {
        if($this->index ==  $this->plan->lessons->count() - 1){
            return null;
        }else{
            return $this->plan->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;

        foreach ($this->plan->lessons as $key => $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->plan->lessons->count());

        return round($advance, 2); 
    }

    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->current->resource->url));
    }
}
