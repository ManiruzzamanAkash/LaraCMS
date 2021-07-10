@if (Route::is('admin.categories.index'))
Categories 
@elseif(Route::is('admin.categories.create'))
Create New Category
@elseif(Route::is('admin.categories.edit'))
Edit Category - {{ $category->name }}
@endif
| Admin Panel - 
{{ config('app.name') }}