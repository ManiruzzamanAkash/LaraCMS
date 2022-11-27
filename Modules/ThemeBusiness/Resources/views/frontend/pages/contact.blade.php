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

        <div class="container my-5">
            <!-- Contact Form -->
            <div class="contact-form" id="contact">
                @include('themebusiness::frontend.layouts.partials.messages')
                <form method="post" action="{{ route('demo.business.contact') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Your name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Your email <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter your email"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label">Your phone no <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter your phone no"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btnSubmit" class="btn btn-primary btn-lg"
                                    value="Send Message" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject" class="control-label">Subject <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="subject" class="form-control" placeholder="Enter your subject"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone_no" class="control-label">Your message <span
                                        class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" placeholder="Enter your message" style="width: 100%; height: 120px;"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.contact-form -->
        </div>
    </div>
@endsection
