<x-mail::message>
<x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
</x-slot:header>
# SOLICITUD DE INFORMACION
 
Hola, esta es una solicitud de informacion de contacto.


<strong>Datos del Usuario: </strong>

<x-mail::panel>

<strong>Usuario: </strong> {{ $data['name'] }} <br>
<strong>Correo: </strong> {{ $data['email'] }} <br>
<strong>Telefono: </strong> {{ $data['phone'] }} <br>
<strong>Asunto: </strong> {{ $data['subject'] }} <br>
<strong>Mensaje: </strong> {{ $data['message'] }}

</x-mail::panel>

Fecha de Solicitud: {{now()}}

Gracias,<br>
FitKing

{{-- Footer --}}
<x-slot:footer>
    <x-mail::footer>
        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    </x-mail::footer>
</x-slot:footer>

</x-mail::message>