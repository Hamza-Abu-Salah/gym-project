@component('mail::message')
# Contact From{{ $user_name}}
{{ $user_message }}

The body of your message.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
