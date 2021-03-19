@component('mail::message')
Hola querido donador, le agradecemos su colaboracion.
Hemos recibido satisfactoriamente su donacion de ${{$donation->amount}}.
@component('mail::panel')
Lo invitamos a seguir navegando por nuestro sitio y conocer todos nuestros proyectos.
@component('mail::button', ['url' => $url])
{{ config('app.name') }}
@endcomponent
@endcomponent
Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
