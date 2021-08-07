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
                    <h1 class="font-weight-bold text-10">Services</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="{{ route('demo.business.index') }}">Home</a>
                        </li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container my-lg-4">
            @include('themebusiness::frontend.pages.partials.our-service')
        </div>
    </section>

    @include('themebusiness::frontend.pages.partials.booking')

</div>
@endsection
