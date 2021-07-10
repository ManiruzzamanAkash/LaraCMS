@if (Route::is('admin.advertisements.index'))
Advertisement
@elseif(Route::is('admin.advertisements.create'))
Create New Advertisement
@elseif(Route::is('admin.advertisements.edit'))
Edit Advertisement - {{ $advertisement->name }}
@endif
| Admin Panel -
{{ config('app.name') }}
