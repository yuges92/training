@component('mail::message')
# Dear {{$user['firstName']}} {{$user['lastName']}},

A new account has been created for you.

<b>Your Login Detail:</b>

<b>Email:</b> {{$user['email']}} 

<b>Username:</b> {{$user['username']}}

<b>Password:</b> password
@component('mail::button', ['url' => '/login'])
Click here login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

