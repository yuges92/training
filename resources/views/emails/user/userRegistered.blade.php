@component('mail::message')
# Dear {{$user['firstName']}} {{$user['lastName']}},

<p>
    Thank you for registering with us. Please keep your log in information safe so that you can use it to access
    important
    information closer to the course
    date.
</p>

<b><u>Your Login Details:</u></b><br>
<b>Email:</b> {{$user->email}} <br>
<b>Username:</b> {{$user->username}} <br>

@component('mail::button', ['url' => route('login')])
Click here login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
