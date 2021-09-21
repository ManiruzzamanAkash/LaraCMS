@extends('themebusiness::frontend.layouts.master')

@section('title')
    Contact Us | {{ config('app.name') }}
@endsection

@section('main-content')

    @php
    $contact_page = \Modules\Article\Entities\Page::where('slug', 'contact-us')->first();
    @endphp

    <div role="main" class="main">
        <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1 class="font-weight-bold text-10">Contact Us</h1>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb breadcrumb-light d-block text-center">
                            <li>
                                <a href="{{ route('demo.business.index') }}">Home</a>
                            </li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        @if ($contact_page)
            <section class="section border-0 py-0 m-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            {!! $contact_page->description !!}
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <iframe src="{{ $contact_page->meta_description }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
