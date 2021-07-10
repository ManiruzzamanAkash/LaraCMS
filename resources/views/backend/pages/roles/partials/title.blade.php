@if (Route::is('admin.roles.index'))
Roles 
@elseif(Route::is('admin.roles.create'))
Create New Role
@elseif(Route::is('admin.roles.edit'))
Edit Role - {{ $role->name }}
@elseif(Route::is('admin.roles.show'))
View Role - {{ $role->name }}
@endif
| Admin Panel - 
{{ config('app.name') }}