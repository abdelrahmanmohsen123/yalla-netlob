{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
 --}}

@component('mail::message')
# Welcome to our dining table

Dear {{$email}},

You have been invited to have a meal with us.
Come on, Don't be shy.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/orders'])
Yalla !Lob 🍔
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
