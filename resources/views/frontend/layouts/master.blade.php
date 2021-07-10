<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', config('app.name'))</title>
    @include('frontend.layouts.partials.meta_tags')
    @yield('social_meta_tags')
    @include('frontend.layouts.partials.styles')
</head>

<body>
    <div class="page-wrapper">
        @include('frontend.layouts.partials.header')
        @yield('main-content')
        @include('frontend.layouts.partials.footer')
    </div>

    @include('frontend.layouts.partials.scripts')
</body>
</html>
