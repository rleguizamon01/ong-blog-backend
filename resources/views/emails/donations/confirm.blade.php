@component('mail::message')
Hola querido aportante, le agradecems su colaboracion
hemos recibido satisfactoriamente su donacion de ${{$donation->amount}}.
Lo invitamos aseguir navegando por nuestro sitio y seguir conociendo nuestros proyectos.
@component('mail::button', ['url' => 'localhost:8000'])
Ir
@endcomponent

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
