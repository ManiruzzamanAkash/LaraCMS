@extends('themebusiness::frontend.layouts.master')

@section('title')
Home | {{ config('app.name') }}
@endsection

@section('main-content')

<div role="main" class="main">

    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-10">{{ $service->title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="{{ route('demo.business.index') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('demo.business.service') }}">Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container my-lg-4">
            <div>
                <div class="text-center mb-4">
                    <img src="{{ asset('public/images/services/' . $service->image) }}" alt="" class="img img-fluid">
                    <br>
                </div>
                <div>
                    {!! $service->description !!}
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('demo.business.booking_request.create') }}?id={{ $service->id }}" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
