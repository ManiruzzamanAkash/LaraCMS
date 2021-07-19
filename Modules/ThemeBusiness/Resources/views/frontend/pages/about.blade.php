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
                    <h1 class="font-weight-bold text-10">About</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @include('themebusiness::frontend.pages.partials.home-about')
    <div class="container pb-2 mb-5">
        <div class="row justify-content-center pb-2 mb-3">
            <div class="col-md-9 col-lg-12 text-center">
                <h2 class="text-color-secondary font-weight-bold line-height-6 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">Our History</h2>
                <p class="custom-font-secondary text-4 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultri.</p>
            </div>
        </div>
        <div class="row appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
            <div class="col">
                <div class="owl-carousel nav-outside nav-arrows-1 appear-animation owl-theme owl-carousel-init fadeInUpShorter appear-animation-visible owl-loaded owl-drag" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{&#39;responsive&#39;: {&#39;0&#39;: {&#39;items&#39;: 1}, &#39;479&#39;: {&#39;items&#39;: 1}, &#39;768&#39;: {&#39;items&#39;: 2}, &#39;979&#39;: {&#39;items&#39;: 3}, &#39;1199&#39;: {&#39;items&#39;: 3}}, &#39;autoplay&#39;: false, &#39;autoplayTimeout&#39;: 5000, &#39;autoplayHoverPause&#39;: true, &#39;dots&#39;: false, &#39;nav&#39;: true, &#39;loop&#39;: false, &#39;margin&#39;: 20, &#39;stagePadding&#39;: &#39;75&#39;}" style="height: auto; animation-delay: 750ms;">




                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1595px;">
                            <div class="owl-item active" style="width: 378.667px; margin-right: 20px;">
                                <div>
                                    <div class="card custom-card-style-1 custom-card-style-1-variation">
                                        <div class="card-body text-center bg-color-light-scale-1 py-5">
                                            <h4 class="text-color-secondary font-weight-bold line-height-1 text-8 mb-2">2010</h4>
                                            <p class="custom-font-secondary text-4 mb-4">Foundation</p>
                                            <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 378.667px; margin-right: 20px;">
                                <div>
                                    <div class="card custom-card-style-1 custom-card-style-1-variation">
                                        <div class="card-body text-center bg-color-light-scale-1 py-5">
                                            <h4 class="text-color-secondary font-weight-bold line-height-1 text-8 mb-2">2012</h4>
                                            <p class="custom-font-secondary text-4 mb-4">30+ Employes</p>
                                            <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 378.667px; margin-right: 20px;">
                                <div>
                                    <div class="card custom-card-style-1 custom-card-style-1-variation">
                                        <div class="card-body text-center bg-color-light-scale-1 py-5">
                                            <h4 class="text-color-secondary font-weight-bold line-height-1 text-8 mb-2">2018</h4>
                                            <p class="custom-font-secondary text-4 mb-4">New Office</p>
                                            <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 378.667px; margin-right: 20px;">
                                <div>
                                    <div class="card custom-card-style-1 custom-card-style-1-variation">
                                        <div class="card-body text-center bg-color-light-scale-1 py-5">
                                            <h4 class="text-color-secondary font-weight-bold line-height-1 text-8 mb-2">2020</h4>
                                            <p class="custom-font-secondary text-4 mb-4">100+ Employes</p>
                                            <p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"></button><button type="button" role="presentation" class="owl-next"></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>
    @include('themebusiness::frontend.pages.partials.our-team')
    @include('themebusiness::frontend.pages.partials.booking')
</div>

@endsection
