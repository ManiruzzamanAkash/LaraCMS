<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            @if (!empty($settings->general->logo))
                <img src="{{ asset('public/assets/images/logo/' . $settings->general->logo) }}" alt=""
                    width="50" />
            @endif
            {{ $settings->general->name }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin Panel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
