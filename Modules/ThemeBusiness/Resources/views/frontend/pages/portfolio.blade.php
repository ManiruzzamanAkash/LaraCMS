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
                        <h1 class="font-weight-bold text-10">Portfolio</h1>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb breadcrumb-light d-block text-center">
                            <li><a href="demo-cleaning-services-portfolio.html#">Home</a></li>
                            <li class="active">Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section border-0 pb-0 pb-lg-5 m-0">
            <div class="container my-lg-4">
                <div class="row mb-4 pb-2">
                    <div class="col">
                        <p class="custom-font-secondary text-4 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="animation-delay: 300ms;">Get reliable &amp; affordable cleaning services for your facility with a 100% satisfaction guaranteed! </p>
                        <p class="pb-1 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus. Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. </p>
                        <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
                    </div>
                </div>
                <div class="row row-gutter-sm">
                    <div class="col-md-6 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                        <a href="demo-cleaning-services-portfolio-detail.html" class="text-decoration-none">
                            <div class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper overlay overlay-color-secondary">
                                    <img src="{{ asset('public/modules/theme-business/images/common/portfolio-1.jpg')}}" class="img-fluid" alt="">
                                    <div class="thumb-info-action text-center flex-column">
                                        <h4 class="text-color-light font-weight-bold text-6 mb-1"> Building</h4>
                                        <span class="d-block text-color-light font-weight-light">Post Construction</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" style="animation-delay: 1100ms;">
                        <a href="demo-cleaning-services-portfolio-detail.html" class="text-decoration-none">
                            <div class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper overlay overlay-color-secondary">
                                    <img src="{{ asset('public/modules/theme-business/images/common/portfolio-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="thumb-info-action text-center flex-column">
                                        <h4 class="text-color-light font-weight-bold text-6 mb-1"> Office</h4>
                                        <span class="d-block text-color-light font-weight-light">Office Cleaning</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" style="animation-delay: 250ms;">
                        <a href="demo-cleaning-services-portfolio-detail.html" class="text-decoration-none">
                            <div class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper overlay overlay-color-secondary">
                                    <img src="{{ asset('public/modules/theme-business/images/common/portfolio-3.jpg')}}" class="img-fluid" alt="">
                                    <div class="thumb-info-action text-center flex-column">
                                        <h4 class="text-color-light font-weight-bold text-6 mb-1"> Enterprise</h4>
                                        <span class="d-block text-color-light font-weight-light">Building Services</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450" style="animation-delay: 450ms;">
                        <a href="demo-cleaning-services-portfolio-detail.html" class="text-decoration-none">
                            <div class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-icons thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper overlay overlay-color-secondary">
                                    <img src="{{ asset('public/modules/theme-business/images/common/portfolio-4.jpg')}}" class="img-fluid" alt="">
                                    <div class="thumb-info-action text-center flex-column">
                                        <h4 class="text-color-light font-weight-bold text-6 mb-1"> Home</h4>
                                        <span class="d-block text-color-light font-weight-light">Cleaning Services</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

     @include('themebusiness::frontend.pages.partials.booking')

    </div>
@endsection
