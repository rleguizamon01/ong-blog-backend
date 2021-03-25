@component('mail::message')
# Solicitud aprobada

Hola {{ $name }}, su solicitud para ser voluntario ha sido aprobada.<br>
Muchas gracias por participar de nuestro proyecto!

@component('mail::button', ['url' => $url])
Ir al Sitio
@endcomponent

Atentamente,<br>
{{ config('app.name') }}
@endcomponent
