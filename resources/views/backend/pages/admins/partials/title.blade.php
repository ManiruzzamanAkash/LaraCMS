@if (Route::is('admin.admins.index'))
Users
@elseif(Route::is('admin.admins.create'))
Create New User
@elseif(Route::is('admin.admins.edit'))
Edit User - {{ $admin->first_name }}
@elseif(Route::is('admin.admins.profile.edit'))
Edit User Profile - {{ $admin->first_name }}
@endif
| User Panel -
{{ config('app.name') }}
