@extends('themebusiness::frontend.layouts.master')

@section('title')
Request a Service | {{ config('app.name') }}
@endsection

@section('main-content')

<div role="main" class="main">
    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-10">
                        Booking Request
                        @if (!empty($service))
                            - {{ $service->title }}
                        @endif
                    </h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="{{ route('demo.business.index') }}">Home</a>
                        </li>
                        <li class="active">Booking Request</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pb-2 mb-5 mt-5">
        <div class="card card-body p-3">
            @include('booking::frontend.partials.booking-request-form')
        </div>
    </div>
</div>
@endsection
