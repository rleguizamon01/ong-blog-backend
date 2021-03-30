@component('mail::message')
# Solicitud rechazada

Hola {{ $name }}, lamentablemente su solicitud para ser voluntario ha sido rechazada.<br>
Muchas gracias por su interes en nuestro proyecto!

@component('mail::button', ['url' => $url])
Ir al Sitio
@endcomponent

Atentamente,<br>
{{ config('app.name') }}
@endcomponent
