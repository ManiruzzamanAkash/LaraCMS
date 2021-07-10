@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<main class="main">

  <!-- Page Content -->

  <div class="main-header">
    <div class="container">
        <h1 class="display-3">Welcome to Lara CMS</h1>
        <p class="lead">
            Admin Panel with Laravel
        </p>
        <a href="{{ route('admin.index') }}" class="btn btn-primary btn-lg">Just Go Now ...</a>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.main-header -->

    <!-- Contact Form -->
    <div class="contact-form" id="contact">
      <form method="post" class="container ">
        <h3>Contact With Me</h3>
        <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="button" name="btnSubmit" class="btnContact" value="Send Message" />
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                  </div>
              </div>
          </div>
      </form>
    </div>
    <!-- /.contact-form -->


</main>

@endsection
