@component('mail::message')
Gracias {{$donation->email}} por tu colaboracion.
Hemos recibido su donacion de ${{$donation->amount}}.
@component('mail::panel')
Lo invitamos a conocer otros proyectos.
@component('mail::button', ['url' => $url])
{{ config('app.name') }}
@endcomponent
@endcomponent
Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
