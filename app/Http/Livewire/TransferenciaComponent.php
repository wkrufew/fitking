<?php

namespace App\Http\Livewire;

use App\Models\Comprador;
use App\Models\Course;
use Livewire\Component;
use App\Mail\CorreoTransferencia;
use Illuminate\Support\Facades\Mail;

class TransferenciaComponent extends Component
{
    public $plan;

    /* protected $listeners = ['tranferenciaPlan']; */

    public function mount(Course $plan)
    {
        $this->plan = $plan;
    }
    
    public function render()
    {
        return view('livewire.transferencia-component');
    }

    public function tranferenciaPlan()
    {
        $user = auth()->user();
        try {
            $exists  = Comprador::where('id_usuario', $user->id)->where('id_plan', $this->plan->id)->exists();

            if ($exists) {
                $notificacion2 = "$user->name ya tienes una reserva de este plan, por favor elige otro de nuestro catálogo de planes.";
                return redirect()->route('planes.show', $this->plan)->with(compact('notificacion2'));
            }

            $reserva = new Comprador();
            $reserva->nombre_usuario = $user->name;
            $reserva->nombre_curso = $this->plan->title;
            $reserva->id_usuario = $user->id;
            $reserva->id_plan = $this->plan->id;
            $reserva->save();

            Mail::to($user->email)
                ->cc('smith93svam@gmail.com')
                ->send(new CorreoTransferencia($this->plan));

            $notificacion = "Felicidades $user->name los pasos para la reserva del plan {$this->plan->title} seran enviados a tu correo";
            return redirect()->route('planes.show', $this->plan)->with(compact('notificacion'));
            
        } catch (\Throwable $th) {
            $notificacionreserva = "A ocurrido un error al realizar el proceso de reserva, por favor vuelve a intentarlo más tarde.";
            return redirect()->route('planes.show', $this->plan)->with(compact('notificacionreserva'));
        }
    }
}
