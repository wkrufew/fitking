<?php

namespace App\Http\Livewire;

use App\Mail\ContactForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactComponent extends Component
{
    public $name, $email, $phone, $subject, $message;
    public $success;

    //Validacion en tiempo real
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'nullable'
    ];

    public function send()
    {
        $this->validate();

        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['phone'] = $this->phone;
        $data['subject'] = $this->subject;
        $data['message'] = $this->message;
        
        //dd(config('services.correo.correo_corporativo'));
        try {
            Mail::to(config('services.correo.correo_corporativo'))->send(new ContactForm($data));

            $this->dispatchBrowserEvent('mensaje', [
                                                    'title' => 'Formulario enviado con éxito!',
                                                    'icon' => 'success'
                                                ]);

            $this->resetForm();
            //return redirect()->to('/');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('mensaje', [
                'title' => 'Hubo un error vuelve a intentarlo mas tarde!',
                'icon' => 'warning'
            ]);
        }

    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
