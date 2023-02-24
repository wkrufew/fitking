<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);  
        
        if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image)
        {
            return back()->with('info', 'Nose puede publicar este plan si no esta completa la informacion');
        }

        $course->status = 3;
        $course->save();

        return redirect()->route('admin.courses.index')->with('info', 'La publicacion del plan a sido todo un exito!');
       
    }

}
