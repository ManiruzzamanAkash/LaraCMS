@if (Route::is('admin.sentences.index'))
Sentences
@elseif(Route::is('admin.sentences.create'))
Create New Sentence
@elseif(Route::is('admin.sentences.edit'))
Edit Sentence - {{ $sentence->en }}
@elseif(Route::is('admin.sentences.show'))
View Sentence - {{ $sentence->en }}
@endif
| Admin Panel -
{{ config('app.name') }}
