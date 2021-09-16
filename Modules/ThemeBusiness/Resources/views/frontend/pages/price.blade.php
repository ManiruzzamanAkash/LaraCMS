@extends('themebusiness::frontend.layouts.master')

@section('title')
Price | {{ config('app.name') }}
@endsection

@section('main-content')

<div role="main" class="main">
    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-10">Prices</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Prices</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('themebusiness::frontend.pages.partials.our-price')
    @include('themebusiness::frontend.pages.partials.our-benefit')

    @include('themebusiness::frontend.pages.partials.booking')
</div>
@endsection
