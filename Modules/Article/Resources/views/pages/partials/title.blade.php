@if (Route::is('admin.pages.index'))
Article/Pages
@elseif(Route::is('admin.pages.create'))
Create New Article/Page
@elseif(Route::is('admin.pages.edit'))
Edit Article/Page - {{ $page->title }}
@elseif(Route::is('admin.pages.show'))
View Article/Page - {{ $page->title }}
@elseif(Route::is('admin.pages.trashed'))
Trashed Article/Page
@endif
| Admin Panel -
{{ config('app.name') }}
