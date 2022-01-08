<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url;

    protected $rules = [
        'lesson.name' => 'required',
        'lesson.platform_id' => 'required',
        //Validación youtube
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
    ];

    protected $messages = [
        'lesson.name.required' => 'Este campo es requerido por favor ingresa un nombre',
        'lesson.platform_id.required' => 'Este campo es requerido',
        'lesson.url.required' => 'El campo link es requerido',
        'lesson.url.regex' => 'El link ingresado no corresponde a Youtube'
    ];

    public function mount(Section $section)
    {
        $this->section = $section; 
        
        $this->platforms = Platform::all();
        
        $this->lesson = new Lesson();
    }
    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
        ];
        $messages =[
            'name.required' => 'Este campo es requerido por favor ingresa un nombre',
            'platform_id.required' => 'Este campo es requerido',
            'url.required' => 'El campo Link es requerido',
            'url.regex' => 'El link no corresponde a la plataforma seleccionada',
        ];

        if($this->platform_id == 2)
        {
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
            
        }

        $this->validate($rules, $messages);

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'section_id' => $this->section->id
        ]);

        //esto ayuda a resetear las variables
        $this->reset(['name', 'platform_id', 'url']);
        
        $this->section = Section::find($this->section->id);
        
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();

        $this->lesson = $lesson;
    }

    public function update()
    {
        if($this->lesson->platform_id == 2)
        {
            $rules = [
                'lesson.name' => 'required',
                'lesson.platform_id' => 'required',
                //Validación Vimeo
                'lesson.url' => ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'],
            ];
            $messages =[
                'lesson.name.required' => 'Este campo es requerido por favor ingresa un nombre',
                'lesson.platform_id.required' => 'Este campo es requerido',
                'lesson.url.required' => 'El campo Link es requerido',
                'lesson.url.regex' => 'El link ingresado no corresponde a Vimeo',
            ];
    
            $this->validate($rules, $messages);
        }
        if($this->lesson->platform_id == 1)
        {
            $this->validate();
        }

        $this->lesson->save();

        $this->lesson = new Lesson();

        $this->section = Section::find($this->section->id);
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        
        $this->section = Section::find($this->section->id);
    }

    public function cancel()
    {
        $this->lesson = new Lesson();
    }
}
