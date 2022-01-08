<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PerfilUser extends Component
{
    use WithFileUploads;

   public $total, $user_id, $telefono, $edad, $peso, $estatura, $cuello, $brazo, $gluteo, $pierna, $pecho, $espalda, $Observacion;
   public $file1,$file2,$fantes, $fdespues,$fotoa, $fotob;
   public $boton="Guardar";

   public function mount()
   {
        $user = User::find(auth()->user()->id);

        if ($user->profile) {
            $this->telefono = $user->profile->telefono;
            $this->edad = $user->profile->edad;
            $this->peso = $user->profile->peso;
            $this->estatura = $user->profile->estatura;
            $this->cuello = $user->profile->cuello;
            $this->brazo = $user->profile->brazo;
            $this->gluteo = $user->profile->gluteo;
            $this->pierna = $user->profile->pierna;
            $this->pecho = $user->profile->pecho;
            $this->Observacion = $user->profile->Observacion;
            $this->espalda = $user->profile->espalda;
            $this->total = $user->profile->total;
            $this->fantes = $user->profile->fantes;
            $this->fdespues = $user->profile->fdespues;

            $this->boton="Actualizar";
        } else {
            //$this->telefono = '';
        }
        
   }
    public function render()
    {   
        return view('livewire.perfil-user');
    }
    
    public function control()
    {   
        //esta funcion controla si es que ya existe un perfil o no y redirige a la funcion que requiera guardar o actualizar
        $user = User::find(auth()->user()->id);
        if ($user->profile) {
            $this->update();
        }else{
            $this->save();
        }
    }

    public function save()
    {
        if($this->file1)
        {  
            //dd($this->file1); 
            $file1 = $this->file1->store('perfiles');
            
        }else{
            $file1="";
        }

        if($this->file2)
        {   
            //dd($this->file2); 
            $file2 = $this->file2->store('perfiles');
        }else{
            $file2 = "";
        }

        $user = User::find(auth()->user()->id);

        $user->profile()->create([
            'telefono' => $this->telefono,
            'edad' => $this->edad,
            'peso' => $this->peso,
            'estatura' => $this->estatura,
            'cuello' => $this->cuello,
            'brazo' => $this->brazo,
            'gluteo' => $this->gluteo,
            'pierna' => $this->pierna,
            'pecho' => $this->pecho,
            'Observacion' => $this->Observacion,
            'espalda' => $this->espalda,
            'total' => $this->total,
            'fantes' => $file1,
            'fdespues' => $file2,
        ]);

        $this->file1="";
        $this->file2="";
        $this->boton="Actualizar";
        session()->flash('mensaje', 'Datos guardados');
        /* return redirect()->route('profile.show'); */
       
    }

    public function update()
    {
        $user = User::find(auth()->user()->id);

        if($this->file1)
        {  
            if ($this->fantes) {
                Storage::delete($this->fantes);
                $this->fotoa= $this->file1->store('perfiles');
                //$this->file1= "";
            }else{
                $this->fotoa = $this->file1->store('perfiles');
            }
        }else{
            $this->fotoa= $this->fantes;
        }

        if($this->file2)
        {  
            if ($this->fdespues) {
                Storage::delete($this->fdespues);
                $this->fotob = $this->file2->store('perfiles');
                //$this->file1= "";
            }else{
                $this->fotob = $this->file2->store('perfiles');
            }
        }else{
            $this->fotob = $this->fdespues;
        }

        

        $user->profile->telefono = $this->telefono;
        $user->profile->edad = $this->edad;
        $user->profile->peso = $this->peso;
        $user->profile->estatura = $this->estatura;
        $user->profile->cuello = $this->cuello;
        $user->profile->brazo = $this->brazo;
        $user->profile->gluteo = $this->gluteo;
        $user->profile->pierna = $this->pierna;
        $user->profile->pecho = $this->pecho;
        $user->profile->Observacion = $this->Observacion;
        $user->profile->espalda = $this->espalda;
        $user->profile->total = $this->total;
        $user->profile->fantes = $this->fotoa;
        $user->profile->fdespues = $this->fotob;
        $user->profile->save();

        $this->fotoa="";
        $this->fotob="";
        $this->file1="";
        $this->file2="";
        session()->flash('mensaje', 'Datos actualizados');
        /* return redirect()->route('profile.show'); */
    }
}
