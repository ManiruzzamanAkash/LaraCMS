@if (Route::is('admin.languages.index'))
Languages
@elseif(Route::is('admin.languages.create'))
Create New Language
@elseif(Route::is('admin.languages.edit'))
Edit Language {{ $language->name }}
@elseif(Route::is('admin.languages.show'))
View Language {{ $language->name }}
@elseif(Route::is('admin.languages.connection.index'))
Language Connections
@endif
| Admin Panel -
{{ config('app.name') }}
