@component('mail::message')
# Post publicado

Le comunicamos que su post ya fue aprobado y publicado.

Titulo del post: {{$title}}

@component('mail::button', ['url' => $url])
Ver Post
@endcomponent

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
