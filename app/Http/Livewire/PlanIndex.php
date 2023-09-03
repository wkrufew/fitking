<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PlanIndex extends Component
{
    use WithPagination;

    public $orden = 'desc';
    public $categorias;
    public $niveles;
    public $eliminandoFiltros = false;

    protected $queryString = [
        'orden' => ['except' => 'desc'],
        'categorias',
        'niveles',
    ];

    public function mount()
    {
        $this->categorias = [];
        $this->niveles = [];
    }

    public function render(): View
    {
        $cacheKey = 'plan-index:' . md5(json_encode([
            'categorias' => $this->categorias,
            'niveles' => $this->niveles,
            'orden' => $this->orden,
            'page' => $this->page,
        ]));

        $planes = Cache::remember($cacheKey, 3600, function () {
            $query = Course::with(['image', 'price:id,value'])
                ->withCount(['students'])
                ->withAvg('reviews', 'rating')
                ->where('status', Course::PUBLICADO)
                ->categorias($this->categorias)
                ->niveles($this->niveles)
                ->orderBy('id', $this->orden);

            if ($this->eliminandoFiltros) {
                $this->resetPage();
                $this->eliminandoFiltros = false;
            }

            return $query->paginate(6);
        });

        $categories = Cache::remember('categories', 3600, function () {
            return Category::select('id', 'name')->whereNull('estado')->get();
        });

        $levels = Cache::remember('levels', 3600, function () {
            return Level::select('id', 'name')->get();
        });

        return view('livewire.plan-index', compact('planes', 'categories', 'levels'));
    }

    public function limpiar()
    {
        $this->reset(['categorias', 'niveles']);
        $this->orden = 'desc';
        $this->eliminandoFiltros = true;
    }
}