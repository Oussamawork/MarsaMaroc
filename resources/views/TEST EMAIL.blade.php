@component('mail::message')
# Introduction

The body of your message :
    @foreach($entities as $entitie)
     <br>  {{ $entitie->label }} <br>
    @endforeach
The User of my Message : 
    @foreach ($utilisateurs as $utilisateur)
        {{ $utilisateur->firstname }}
    @endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
