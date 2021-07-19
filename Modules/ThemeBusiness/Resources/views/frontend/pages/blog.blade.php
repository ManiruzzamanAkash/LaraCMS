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
                    <h1 class="font-weight-bold text-10">BLOG</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section position-relative border-0 m-0">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600" style="animation-delay: 1600ms;">

                    <article class="mb-5">
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-3 z-index-1">
                                <a href="demo-cleaning-services-blog-post.html">
                                    <img class="card-img-top border-radius-0 mb-2" src="{{ asset('public/modules/theme-business/images/common/blog-big-1.jpg')}}" alt="Card Image">
                                </a>
                                <p class="text-uppercase text-color-default text-1 my-2">
                                    <time pubdate="" datetime="2021-01-10">10 Jan 2021</time>
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    3 Comments
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    John Doe
                                </p>
                                <div class="card-body p-0">
                                    <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="demo-cleaning-services-blog-post.html">Lorem ipsum dolor sit amet</a></h4>
                                    <p class="card-text mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem , consectetur adipiscing elit...</p>
                                    <a href="demo-cleaning-services-blog-post.html" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="mb-5">
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-3 z-index-1">
                                <a href="demo-cleaning-services-blog-post.html">
                                    <img class="card-img-top border-radius-0 mb-2" src="{{ asset('public/modules/theme-business/images/common/blog-big-2.jpg')}}" alt="Card Image">
                                </a>
                                <p class="text-uppercase text-color-default text-1 my-2">
                                    <time pubdate="" datetime="2021-01-10">10 Jan 2021</time>
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    3 Comments
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    John Doe
                                </p>
                                <div class="card-body p-0">
                                    <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="demo-cleaning-services-blog-post.html">Lorem ipsum dolor sit amet</a></h4>
                                    <p class="card-text mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem , consectetur adipiscing elit...</p>
                                    <a href="demo-cleaning-services-blog-post.html" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <ul class="custom-pagination-style-1 pagination pagination-rounded pagination-md justify-content-center">
                        <li class="page-item"><a class="page-link" href="demo-cleaning-services-blog.html#"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="demo-cleaning-services-blog.html#">1</a></li>
                        <li class="page-item"><a class="page-link" href="demo-cleaning-services-blog.html#">2</a></li>
                        <li class="page-item"><a class="page-link" href="demo-cleaning-services-blog.html#">3</a></li>
                        <li class="page-item"><a class="page-link" href="demo-cleaning-services-blog.html#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>

                </div>
                <div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800" style="animation-delay: 1800ms;">
                    <aside class="sidebar">
                        <div class="px-3 mb-4">
                            <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">About The Blog</h3>
                            <p class="m-0">Lorem ipsum dolor sit amet, conse elit porta. Vestibulum ante justo, volutpat quis porta diam.</p>
                        </div>
                        <div class="py-1 clearfix">
                            <hr class="my-2">
                        </div>
                        <div class="px-3 mt-4">
                            <form action="page-search-results.html" method="get">
                                <div class="input-group mb-3 pb-1">
                                    <input class="form-control box-shadow-none text-1 border-0 bg-color-grey" placeholder="Search..." name="s" id="s" type="text">
                                    <button type="submit" class="btn bg-color-grey text-1 p-2"><i class="fas fa-search m-2"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="py-1 clearfix">
                            <hr class="my-2">
                        </div>
                        <div class="px-3 mt-4">
                            <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Recent Posts</h3>
                            <div class="pb-2 mb-1">
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">10 Jan 2021 <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4">Lorem ipsum dolor sit amet</a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">10 Jan 2021 <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4">Consectetur adipiscing elit</a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">10 Jan 2021 <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4">Vivamus sollicitudin nibh luctus</a>
                            </div>
                        </div>
                        <div class="py-1 clearfix">
                            <hr class="my-2">
                        </div>
                        <div class="px-3 mt-4">
                            <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Recent Comments</h3>
                            <div class="pb-2 mb-1">
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-2 mb-0 d-block text-decoration-none line-height-4">Admin on <strong class="text-color-dark text-hover-primary text-4">Vivamus sollicitudin</strong> <span class="text-uppercase text-1 d-block pt-1 pb-3">10 Jan 2021</span></a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-2 mb-0 d-block text-decoration-none line-height-4">John Doe on <strong class="text-color-dark text-hover-primary text-4">Lorem ipsum dolor</strong> <span class="text-uppercase text-1 d-block pt-1 pb-3">10 Jan 2021</span></a>
                                <a href="demo-cleaning-services-blog.html#" class="text-color-default text-2 mb-0 d-block text-decoration-none line-height-4">Admin on <strong class="text-color-dark text-hover-primary text-4">Consectetur adipiscing</strong> <span class="text-uppercase text-1 d-block pt-1 pb-3">10 Jan 2021</span></a>
                            </div>
                        </div>
                        <div class="py-1 clearfix">
                            <hr class="my-2">
                        </div>
                        <div class="px-3 mt-4">
                            <h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0">Categories</h3>
                            <ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
                                <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Design (2)</a></li>
                                <li class="nav-item">
                                    <a class="nav-link bg-transparent border-0 active" href="demo-cleaning-services-blog.html#">Photos (4)</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Animals</a></li>
                                        <li class="nav-item"><a class="nav-link bg-transparent border-0 active" href="demo-cleaning-services-blog.html#">Business</a></li>
                                        <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Sports</a></li>
                                        <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">People</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Videos (3)</a></li>
                                <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Lifestyle (2)</a></li>
                                <li class="nav-item"><a class="nav-link bg-transparent border-0" href="demo-cleaning-services-blog.html#">Technology (1)</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    @include('themebusiness::frontend.pages.partials.booking')

</div>
@endsection
