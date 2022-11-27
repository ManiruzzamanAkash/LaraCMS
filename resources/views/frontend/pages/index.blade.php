@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<main class="main">

  <!-- Page Content -->
  <div class="main-header">
    <div class="container">
        <h1 class="display-4">Welcome to {{ $settings->general->name }}</h1>
        <p class="lead">
            A Great Customized admin panel built with Laravel...
        </p>
        <a href="{{ route('admin.index') }}" class="btn btn-primary btn-lg">Go ››</a>
    </div>

    <div class="container mt-5">
        <h1 class="display-4">Get Frontend Themes</h1>
        <div class="row justify-content-center">
            <div class="card card-body col-sm-12 col-md-3 col-lg-4">
                <h4 class="mb-3">Business Website</h4>
                <a href="{{ route('demo.business.index') }}" class="btn btn-info">
                    Go ››
                </a>
            </div>
        </div>

    </div>
    <!-- /.container -->
  </div>
</main>

@endsection
