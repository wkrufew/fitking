<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\WithPagination;

class PlanIndex extends Component
{
    use WithPagination;

    public $orden = 'DESC';
    public $categoria = [];

    public function render()
    {
        $categories = Category::select('id', 'name')->where('estado', NULL)->get();

        if (count($this->categoria) > 0) {
            $planes = Course::where('status', 3)->with(['image', 'price:id,value,name'])->whereIn('category_id', $this->categoria)
                ->withCount('students')
                ->orderBy('id', $this->orden)
                ->paginate(6);
        } else {
            $planes = Course::where('status', 3)->with(['image', 'price:id,value,name'])
                ->withCount('students')
                ->orderBy('id', $this->orden)
                ->paginate(6);
        }
        return view('livewire.plan-index', compact('planes', 'categories'));
    }

    public function limpiar()
    {
        $this->orden = 'DESC';
        $this->categoria = [];
    }
}
