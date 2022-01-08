<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class PlanIndex extends Component
{
    use WithPagination;

    /* public $categoria_id;
    public $nivel_id;
 */
    public function render()
    {
       /*  $categorias = Category::where('estado',Null)->get();
        $niveles = Level::all();  */
       
        $planes = Course::where('status', 3)->with(['image','price','reviews','teacher','students'])
                            /* ->category($this->categoria_id)
                            ->level($this->nivel_id) */
                            ->latest('id', $this->id)
                            ->paginate(8);
                            
        return view('livewire.plan-index', compact('planes')); 
    }

    /* public function resetFilter()
    {
       $this->reset(['categoria_id','nivel_id']);
    } */

}
