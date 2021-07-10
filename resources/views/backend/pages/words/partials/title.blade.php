@if (Route::is('admin.words.index'))
Words
@elseif(Route::is('admin.words.create'))
Create New Word
@elseif(Route::is('admin.words.edit'))
Edit Word - {{ $word->en }}
@elseif(Route::is('admin.words.show'))
View Word - {{ $word->en }}
@endif
| Admin Panel -
{{ config('app.name') }}
