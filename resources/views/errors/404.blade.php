@extends('errors.layouts.master')

@section('title')
    Page Not Found Error | Page Is Not Available
@endsection

@section('admin-content')
    <div class="container-fluid text-center">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title">404</h1>
                <h3 class="text-uppercase error-subtitle">PAGE NOT FOUND ERROR !</h3>
                <p class="text-muted m-t-30 m-b-30">THE PAGE YOU'RE LOOKING ARE NOT AVAILABLE !</p>
                <a href="{{ route('admin.index') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
        </div>
    </div>
@endsection