@component('mail::message')
# You've reecieved an email from **{{ $contact->name }}**

## Subject

{{ $contact->subject }}

## Message

{{ $contact->message }}

## Customer Information

**Email** - <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>

**Phone** - <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent