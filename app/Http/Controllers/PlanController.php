<?php

namespace App\Http\Controllers;


use App\Models\Course;

class PlanController extends Controller
{
    public function index()
    {
        //$planes = Course::all();
        return view('planes.index');
    }

    public function show(Course $plan)
    {
        $this->authorize('published', $plan);
        
        $similares = Course::where('category_id', $plan->category_id)->with(['image','teacher'])
                            ->where('id', '!=', $plan->id)
                            ->where('status', 3)
                            ->take(2)
                            ->get();
                            //->random();lessons

                        $plan = $plan->where('id',$plan->id)->with('sections')->with('sections.lessons')->first();
                        //dd($plan);
                            
        return view('planes.show', compact('plan','similares'));
    }

    public function enrolled(Course $plan)
    {
        try {
            // fin del envio de correos
        $plan->students()->attach(auth()->user()->id);
        
        } catch (\Exception $e) {
            //session()->flash('errores', 'Ocurrio un error, intentalo nuevamente');
            return redirect()->back();
        }
        //$plan->students()->updateExistingPivot(auth()->user()->id, ['estado' => 1]);//atualiza un campo especifico de la tabla pivot osea course_user
        return redirect()->route('planes.status', $plan);
    }
}
