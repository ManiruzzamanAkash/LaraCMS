@if (Route::is('admin.booking_request.index'))
Booking Requests
@elseif(Route::is('admin.booking_request.edit'))
Edit Booking Request - {{ $booking_request->name }}
@elseif(Route::is('admin.booking_request.trashed'))
Trashed Booking Requests
@endif
| Admin Panel -
{{ config('app.name') }}
