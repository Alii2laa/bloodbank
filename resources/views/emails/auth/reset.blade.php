@component('mail::message')
Hello,

Bank blood reset password.

@component('mail::button', ['url' => 'https://www.google.com'])
Reset
@endcomponent

<p>Your reset code : <strong> <a href="http://bloodbank.ipd3/client/change/{{$code}}/?phone={{$phone}}"> تغير كلمة المرور</a></strong></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
