@if (Route::is('admin.services.index'))
Services
@elseif(Route::is('admin.services.create'))
Create New Service
@elseif(Route::is('admin.services.edit'))
Edit Service - {{ $service->title }}
@elseif(Route::is('admin.services.show'))
View Service - {{ $service->title }}
@elseif(Route::is('admin.services.trashed'))
Trashed Service
@endif
| Admin Panel -
{{ config('app.name') }}
