@if (Route::is('admin.contacts.index'))
Contacts
@elseif (Route::is('admin.contacts.show'))
View Contact
@endif
| Admin Panel -
{{ config('app.name') }}
