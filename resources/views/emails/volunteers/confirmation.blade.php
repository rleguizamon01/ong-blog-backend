@component('mail::message')
# Solicitud recibida

Estimado/a {{ $first_name }}, su solicitud ya fue recibida y está pendiente de aprobación.

@component('mail::button', ['url' => $url])
Ir a la página principal
@endcomponent

Atentamente,<br>
{{ config('app.name') }}
@endcomponent
