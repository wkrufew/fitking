<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use App\Models\User;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Planes')->only('index');

        $this->middleware('can:Crear Planes')->only('create', 'store');

        $this->middleware('can:Actualizar Planes')->only('edit', 'update', 'goals');

        $this->middleware('can:Eliminar Planes')->only('destroy');

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('estado',null)->pluck('name', 'id'); 
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'El campo Titulo es requerido',
            'subtitle.required' => 'El capo subtitulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description.required' => 'El campo descripcion es requerido',
            'category_id.required' => 'Debe seleccionar una categoria',
            'level_id.required' => 'Debe seleccionar un nivel',
            'price_id.required' => 'Debe seleccionar un precio',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            //'file.mimes'=>'No es una imagen',
        ];
        $rules = [
            'title'=> array('required'),
            'subtitle'=>array('required'),
            'slug'=> array('required','unique:courses'),
            'description'=>array('required'),
            'category_id'=> array('required'),
            'level_id'=>array('required'),
            'price_id'=>array('required'),
            'file'=>array('image'),
            //'file' => array('mimes:jpeg,png,jpg'),
        ];
        
        $this->validate($request, $rules, $messages);
        
        //$course = Course::create($request->all());
        $course=new Course($request->all());
        $course->user_id=auth()->user()->id;
        $course->save();

        if($request->file('file'))
        {
             $url = Storage::put('courses', $request->file('file'));

             $course->image()->create([
                'url' => $url
             ]);
        }
        
        $plan = $request->title;
        $notificacion="El Plan $plan se ha creado correctamente";

        return redirect()->route('instructor.courses.index')->with(compact('notificacion'));
        //return $request->all();   ->with(compact('notificacion'))
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dicatated',$course);

        $categories = Category::where('estado',null)->pluck('name', 'id'); 
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dicatated',$course);
        
        $messages = [
            'title.required' => 'El campo Titulo es requerido',
            'subtitle.required' => 'El capo subtitulo es requerido',
            'slug.required' => 'El campo nombre es requerido',
            'slug.unique' => 'El slug ya existe por favor intenta con otro titulo',
            'description.required' => 'El campo descripcion es requerido',
            'category_id.required' => 'Debe seleccionar una categoria',
            'level_id.required' => 'Debe seleccionar un nivel',
            'price_id.required' => 'Debe seleccionar un precio',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.mimes'=>'No es una imagen',
        ];
        $rules = [
            'title'=> array('required'),
            'subtitle'=>array('required'),
            'slug'=> array('required','unique:courses,slug,' . $course->id),
            'description'=>array('required'),
            'category_id'=> array('required'),
            'level_id'=>array('required'),
            'price_id'=>array('required'),
            'file'=>array('image'),
            'file' => array('mimes:jpeg,png'),
        ];
        
        $this->validate($request, $rules, $messages);

        $course->update($request->all());

        if($request->file('file'))
        {
            $url = Storage::put('courses', $request->file('file'));

            if ($course->image) {
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url
                ]);
            }else{
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('instructor.courses.edit', $course);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course)
    {
        $this->authorize('dicatated',$course);

        return view('instructor.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = 2;
        $course->save();

        return back();
    }
    
}
