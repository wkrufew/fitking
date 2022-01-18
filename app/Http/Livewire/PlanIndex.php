<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class PlanIndex extends Component
{
    use WithPagination;

    public function render()
    {       
        $planes = Course::where('status', 3)->with(['image','price','reviews','teacher','students'])
                            ->latest('id', $this->id)
                            ->paginate(8);
        return view('livewire.plan-index', compact('planes')); 
    }
}
