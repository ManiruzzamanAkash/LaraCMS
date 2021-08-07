@extends('backend.layouts.errors_master')

@section('title')
    Authentication Error | Not authorized to access this page
@endsection

@section('error-content')
    <div class="container-fluid text-center">
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title">403</h1>
                <h3 class="text-uppercase error-subtitle">FORBIDDON ERROR!</h3>
                <p class="text-muted m-t-30 m-b-30">YOU DON'T HAVE PERMISSION TO DO THIS ACTION.</p>
                <a href="{{ route('admin.index') }}" class="btn btn-primary btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-arrow-left"></i> Back to home</a>


                @if (Auth::check())
                    <button class="btn btn-danger btn-rounded waves-effect waves-light m-b-40" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false" > Logout Now <i class="fa fa-arrow-right"></i></button>
                    <form id="logout-form" method="POST" style="display: none;" action="{{ route('admin.logout') }}">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('admin.login') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"> Login Again <i class="fa fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </div>
@endsection
