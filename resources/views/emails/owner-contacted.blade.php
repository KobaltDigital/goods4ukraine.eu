@component('mail::message')
    {{ __('Dear') }} {{ $ad->user->name }} <br><br>
    {{ __('You have a response to your ad:') }} {{ $ad->title }} <br><br>
    {{ __('From:') }} {{ $data->name }} <br>
    {{ __('Email address:') }} {{ $data->email }} <br>
    {{ __('Phone:') }} {{ $data->phone }} <br><br>
    <strong>Bericht in het Nederlands:</strong><br>
    {{ $data->message_translated['nl'] }}<br><br>
    <strong>Message in English:</strong><br>
    {{ $data->message_translated['en'] }} <br><br>
    <strong>повідомлення українською мовою:</strong><br>
    {{ $data->message_translated['ua'] }} <br><br>
    <strong>сообщение на русском языке:</strong><br>
    {{ $data->message_translated['ru'] }} <br><br>
    {{ __('You have to respond to :name yourself, by contacting him/her now.', ['name' => $data->name]) }}<br><br>
    {{ __('Do you want to put the ad on reserved?') }} <a href="{{ route('admin.ads.reserve',['ad' => $ad]) }}">({{ __('Click here') }})</a><br>
    {{ __('Do you want to remove the ad?') }} <a href="{{ route('admin.ads.destroy', ['ad' => $ad]) }}">({{ __('Click here') }})</a><br>
    {{ __('Thank you for using Goods4Ukraine.eu.') }}<br><br>
    {{ __('Greeting') }},<br>
    {{ config('app.name') }}
@endcomponent
