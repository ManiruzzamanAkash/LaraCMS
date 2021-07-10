@if (Route::is('admin.blogs.index'))
Blogs 
@elseif(Route::is('admin.blogs.create'))
Create New Blog
@elseif(Route::is('admin.blogs.edit'))
Edit Blog {{ $blog->title }}
@elseif(Route::is('admin.blogs.show'))
View Blog {{ $blog->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}