@extends('backend.auth.master')

@section('auth-content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('public/assets/backend/images/big/auth-bg.jpg') }}) no-repeat center center;">
    <div class="auth-box">
        <div id="">
            <div class="logo">
                <span class="db"><img src="{{ asset('public/assets/common/logos/logo.png') }}" alt="logo" /></span>
                <h5 class="font-medium m-b-20">Recover Password</h5>
                <span>Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row m-t-20">
                <!-- Form -->
                <form class="col-12" action="">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                        </div>
                        <div class="col-12 mt-3 text-right">
                            Or, <a class="btn" href="{{ route('admin.login') }}">Login Now</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection