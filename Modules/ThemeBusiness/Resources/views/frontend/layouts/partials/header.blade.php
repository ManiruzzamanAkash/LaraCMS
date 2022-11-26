<header id="header" class="header-effect-shrink"
    data-plugin-options="{&#39;stickyEnabled&#39;: true, &#39;stickyEffect&#39;: &#39;shrink&#39;, &#39;stickyEnableOnBoxed&#39;: true, &#39;stickyEnableOnMobile&#39;: false, &#39;stickyChangeLogo&#39;: true, &#39;stickyStartAt&#39;: 30, &#39;stickyHeaderContainerHeight&#39;: 85}"
    style="height: 163px;">
    <div class="header-body header-body-bottom-border border-top-0" style="position: fixed; top: 0px;">

        <div class="header-container container" style="height: 85px; min-height: 0px;">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo" style="width: 123px; height: 33px;">
                            <a href="{{ route('demo.business.index') }}">
                                @if (empty($settings->general->logo))
                                    {{ $settings->general->name }}
                                @else
                                    <img src="{{ asset('public/assets/images/logo/' . $settings->general->logo) }}"
                                        class="img-fluid" alt="" style="top: 0px; height: 90px;">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links">
                            <div
                                class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li><a href="{{ route('demo.business.index') }}"
                                                class="nav-link {{ Route::is('demo.business.index') ? 'active current-page-active' : '' }}">Home</a>
                                        </li>
                                        <li><a href="{{ route('demo.business.about') }}"
                                                class="nav-link {{ Route::is('demo.business.about') ? 'active current-page-active' : '' }}">About</a>
                                        </li>
                                        <li><a href="{{ route('demo.business.service') }}"
                                                class="nav-link {{ Route::is('demo.business.service') ? 'active current-page-active' : '' }}">Services</a>
                                        </li>
                                        <li><a href="{{ route('demo.business.contact') }}"
                                                class="nav-link {{ Route::is('demo.business.contact') ? 'active current-page-active' : '' }}">Contact</a>
                                        </li>
                                        <!-- <li><a href="{{ route('demo.business.portfolio') }}" class="nav-link">Portfolio</a></li> -->
                                        <li><a href="{{ route('demo.business.booking_request.create') }}"
                                                class="nav-link {{ Route::is('demo.business.booking_request.create') || Route::is('demo.business.booking_request.create.billing') ? 'active current-page-active' : '' }}">Request
                                                Now</a></li>
                                        <!-- <li><a href="{{ route('demo.business.blog') }}" class="nav-link">Blog</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="feature-box feature-box-style-2 align-items-center ms-lg-4">
                            <div class="feature-box-icon d-none d-sm-inline-flex">
                                <div
                                    class="animated-icon animated fadeIn svg-fill-color-tertiary position-relative bottom-3">
                                    <!--?xml version="1.0" ?--><svg style="enable-background:new 0 0 512 512;"
                                        version="1.1" viewBox="0 0 512 512" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        id="icon_131625898372090" data-filename="phone.svg" width="48"
                                        height="48">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #333333;
                                            }
                                        </style>
                                        <g id="Layer_1"></g>
                                        <g id="Layer_2">
                                            <g>
                                                <path class="st0"
                                                    d="M62.77,99.94c-14.45,17.9-21.14,45.74-17.05,70.93c0.02,0.14,0.05,0.27,0.07,0.41    c18.22,96.43,53.43,187.76,104.65,271.46c12.08,20.3,33.35,35.75,55.54,40.32c4.75,0.98,9.44,1.47,14.03,1.47    c13.26,0,25.73-4.05,36.64-11.99c0.1-0.07,0.21-0.15,0.31-0.23l46.55-35.62c0.23-0.17,0.45-0.35,0.67-0.54    c17.25-14.73,20.29-41.25,6.85-59.31c-10.45-15.1-19.43-29.28-27.46-43.33c-0.1-0.18-0.21-0.36-0.32-0.54    c-11.01-17.63-35.9-29.37-57.04-17.74l-17.09,8.84c-16.16-33.87-29.4-68.19-40.15-104.14l18.82-4.98    c0.27-0.07,0.54-0.15,0.81-0.24c21.61-6.95,34.62-30.21,29.16-51.97c-3.85-17.94-6.7-34.48-8.72-50.54    c-0.03-0.21-0.06-0.42-0.09-0.62c-3.41-20.58-21.89-41.06-45.86-38.46l-57.95,4.82C88.29,78.88,73.64,86.48,62.77,99.94z     M107.56,109.84l58.41-4.86c0.18-0.01,0.35-0.03,0.53-0.05c4.77-0.56,9.77,5.85,10.84,11.62c2.14,16.96,5.15,34.37,9.2,53.21    c0.05,0.23,0.1,0.45,0.16,0.68c1.39,5.34-2.21,11.78-7.6,13.71l-34.12,9.03c-4.13,1.09-7.65,3.79-9.78,7.5s-2.69,8.11-1.55,12.23    c13.5,48.93,31.17,94.75,54.01,140.08c1.92,3.82,5.29,6.7,9.36,8.02c4.06,1.32,8.49,0.95,12.28-1.01l31.81-16.45    c0.16-0.08,0.32-0.17,0.47-0.26c4.19-2.35,11.22,1.56,14.38,6.42c8.49,14.84,17.95,29.76,28.93,45.6    c0.13,0.19,0.27,0.38,0.41,0.56c3.39,4.47,2.58,11.87-1.65,15.73l-45.97,35.17c-7.28,5.24-15.77,6.91-25.25,4.95    c-13.48-2.78-27.04-12.75-34.54-25.4c-0.04-0.06-0.08-0.13-0.12-0.19c-49.18-80.34-83-168.01-100.51-260.57    c-2.55-16.07,1.71-34.75,10.4-45.51c5.2-6.44,11.54-9.76,19.39-10.17C107.23,109.87,107.4,109.86,107.56,109.84z">
                                                </path>
                                                <path class="st0"
                                                    d="M313.75,306.78c2.48,1.39,5.17,2.05,7.82,2.05c5.6,0,11.03-2.94,13.97-8.17    c15.8-28.15,18.22-61.54,6.62-91.62c-12.84-33.31-41.28-58.05-76.06-66.18c-8.61-2.01-17.21,3.33-19.22,11.94    c-2.01,8.6,3.33,17.21,11.94,19.22c24.47,5.72,44.46,23.12,53.49,46.54c8.15,21.15,6.45,44.63-4.67,64.44    C303.31,292.7,306.05,302.46,313.75,306.78z">
                                                </path>
                                                <path class="st0"
                                                    d="M438.36,358.56c33.15-58.95,38.22-128.92,13.91-191.97c-26.91-69.78-86.49-121.61-159.4-138.67    c-8.61-2.01-17.21,3.33-19.22,11.94c-2.01,8.6,3.33,17.21,11.94,19.22c62.58,14.64,113.73,59.13,136.83,119.02    c20.87,54.11,16.51,114.17-11.94,164.77c-4.33,7.7-1.6,17.46,6.1,21.79c2.48,1.39,5.17,2.06,7.83,2.06    C429.99,366.72,435.42,363.78,438.36,358.56z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="feature-box-info ps-2">
                                <p class="font-weight-semibold line-height-1 text-2 pb-0 mb-1">CALL US NOW</p>
                                <a href="tel:{{ $settings->contact->contact_no }}"
                                    class="text-color-tertiary text-color-hover-primary text-decoration-none font-weight-bold line-height-1 custom-font-size-1 pb-0">
                                    {{ $settings->contact->contact_no }}
                                </a>
                            </div>
                        </div>
                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                            data-bs-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
