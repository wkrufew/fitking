<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Mail\CorreoPlan;
use Illuminate\Support\Facades\Mail;

class PaymentOrder extends Component
{
    public $plan;

    protected $listeners = ['payPlan'];

    public function mount(Course $plan)
    {
        $this->plan = $plan;
    }
    public function render()
    {
        return view('livewire.payment-order');
    }

    public function payPlan()
    {
        try {
            Mail::to(auth()->user()->email)
                ->cc('smith93svam@gmail.com')
                ->send(new CorreoPlan($this->plan));
            $this->plan->students()->attach(auth()->user()->id);
            $exitopaypal="Bienvenido al Team FitKing, ". auth()->user()->name ." has adquirido el plan que te llevará al siguiente nivel";
            return redirect()->route('planes.status', $this->plan)->with(compact('exitopaypal'));
        } catch (\Throwable $th) {
            $errorpaypal="Estimado ". auth()->user()->name ." ocurrió un problema por favor intenta adquirir el plan más tarde ";
            return redirect()->route('planes.show', $this->plan)->with(compact('errorpaypal'));
        }
    }
}
