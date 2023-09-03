<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;

class PlanController extends Controller
{
    public function index()
    {
        return view('planes.index');
    }

    public function show(Course $plan)
    {
        $this->authorize('published', $plan);

        $similares = Cache::remember('similares_'.$plan->id, 3600, function () use ($plan) {
            return Course::where('category_id', $plan->category_id)
                ->where('id', '!=', $plan->id)
                ->where('status', 3)
                ->with(['image', 'teacher'])
                ->withAvg('reviews', 'rating')
                ->take(2)
                ->get();
        });

        $plan = Cache::remember('plan_'.$plan->id, 3600, function () use ($plan) {
            $plan->load(['goals', 'requirements', 'audiences', 'sections.lessons.users', 'teacher'])
                ->loadCount('students')
                ->loadAvg('reviews', 'rating');
            return $plan;
        });

        return view('planes.show', compact('plan', 'similares'));
    }

    public function enrolled(Course $plan)
    {
        return "simon";
        try {
            $plan->students()->attach(auth()->user()->id);
        } catch (\Exception $e) {
            session()->flash('errores', 'Ocurrió un error, inténtalo nuevamente');
            return redirect()->back();
        }
        //$plan->students()->updateExistingPivot(auth()->user()->id, ['estado' => 1]);//atualiza un campo especifico de la tabla pivot osea course_user
        return redirect()->route('planes.status', $plan);
    }
}

