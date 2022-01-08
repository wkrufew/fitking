<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

use Livewire\WithFileUploads;

class LessonResources extends Component
{
    use WithFileUploads;

    public $lesson, $file;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
    public function render()
    {
        return view('livewire.instructor.lesson-resources');
    }

    public function save()
    {
        $rules = [
            'file' => 'required'           
        ];
        $messages =[
            'file.required' => 'Debe agregar un archivo'
        ];

        $this->validate($rules, $messages);

        $url = $this->file->store('resources');

        $this->lesson->resource()->create([
            'url' => $url
        ]);

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function destroy()
    {
        //elimina del servidor el recurso
        Storage::delete($this->lesson->resource->url);
        //elimina de la base de datos el recurso
        $this->lesson->resource->delete();
        //refresca la lecciones
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
    }

    
}
