@php
$teams = \App\Models\Admin::where('visible_in_team', 1)->get();
@endphp
<section class="section section-with-shape-divider bg-transparent border-0 pb-4 m-0">
    <div class="shape-divider shape-divider-reverse-x" style="height: 102px;">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 1920 102" preserveAspectRatio="xMinYMin">
            <path fill="#F7F7F7" d="M1895,78c-56.71-6.03-113.75-12.1-167-17c-75.42-6.94-133.81-10.66-171-13c-62.1-3.91-108.85-5.97-155-8
                    c-35.96-1.58-78.06-3.42-133-5c-59.81-1.72-103.18-2.23-172-3c-92.17-1.03-154.41-1.01-169-1c-69.05,0.05-115.16,0.67-137,1
                    c-43.08,0.65-76.21,1.48-97,2c-28.02,0.7-71.13,1.8-128,4c-16.64,0.64-57.72,2.28-111,5c-26.12,1.33-67.11,3.45-121,7
                    c-21.14,1.39-54.21,3.59-96,7c-19.93,1.63-39.22,3.32-47,4c-16.12,1.41-33.55,2.94-55,5c-26.48,2.54-19.07,2.04-77,8
                    c-19.39,1.99-36.94,3.77-60.59,7.46V103H1923V81C1916.55,80.3,1906.82,79.26,1895,78z"></path>
        </svg>
    </div>
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center pb-2 mb-3">
            <div class="col-md-9 col-lg-12 text-center">
                <h2 class="text-color-secondary font-weight-bold line-height-6 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                    style="animation-delay: 200ms;">Our Team</h2>
                <p class="custom-font-secondary text-4 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"
                    style="animation-delay: 400ms;">
                    We've a team with strong knowledge of the technologies and the system they working...
                </p>
            </div>
        </div>
        <div class="row appear-animation animated fadeInUpShorter appear-animation-visible"
            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" style="animation-delay: 600ms;">
            <div class="col">
                <div class="owl-carousel nav-outside nav-arrows-1 appear-animation owl-theme owl-carousel-init fadeInUpShorter appear-animation-visible owl-loaded owl-drag"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                    data-plugin-options="{&#39;responsive&#39;: {&#39;0&#39;: {&#39;items&#39;: 1}, &#39;479&#39;: {&#39;items&#39;: 1}, &#39;768&#39;: {&#39;items&#39;: 2}, &#39;979&#39;: {&#39;items&#39;: 3}, &#39;1199&#39;: {&#39;items&#39;: 3}}, &#39;autoplay&#39;: false, &#39;autoplayTimeout&#39;: 5000, &#39;autoplayHoverPause&#39;: true, &#39;dots&#39;: false, &#39;nav&#39;: true, &#39;loop&#39;: false, &#39;margin&#39;: 20, &#39;stagePadding&#39;: &#39;75&#39;}"
                    style="height: auto; animation-delay: 750ms;">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1595px;">
                            @foreach ($teams as $user)
                                @php $user_social_links = json_decode(empty($user->social_links) ? '' : $user->social_links); @endphp
                                <div class="owl-item" style="width: 378.667px; margin-right: 20px;">
                                    <div>
                                        <div class="card custom-card-style-1 custom-card-style-1-variation">
                                            <div class="card-body text-center bg-color-light-scale-1 py-5">
                                                <div
                                                    class="custom-card-style-1-image-wrapper bg-primary rounded-circle d-inline-block mb-3">
                                                    <a href="">
                                                        <img src="{{ asset('public/assets/images/admins/' . $user->avatar) }}"
                                                            class="img-fluid rounded-circle" alt="">
                                                    </a>
                                                </div>
                                                <h4
                                                    class="text-color-secondary font-weight-bold line-height-1 text-5 mb-0">
                                                    <a href=""
                                                        class="text-color-secondary text-color-hover-primary text-decoration-none">
                                                        {{ $user->first_name . ' ' . $user->last_name }}
                                                    </a>
                                                </h4>
                                                <p class="text-2 pb-1 mb-2">{{ $user->designation }}</p>
                                                <ul class="social-icons custom-social-icons social-icons-big">
                                                    @if (!empty($user_social_links->facebook))
                                                        <li class="social-icons-facebook"><a
                                                                href="{{ $user_social_links->facebook }}"
                                                                target="_blank" title="Facebook"><i
                                                                    class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                    @endif

                                                    @if (!empty($user_social_links->linkedin))
                                                        <li class="social-icons-linkedin"><a
                                                                href="{{ $user_social_links->linkedin }}"
                                                                target="_blank" title="linkedin"><i
                                                                    class="fab fa-linkedin"></i></a>
                                                        </li>
                                                    @endif

                                                    @if (!empty($user_social_links->youtube))
                                                        <li class="social-icons-youtube"><a
                                                                href="{{ $user_social_links->youtube }}"
                                                                target="_blank" title="youtube"><i
                                                                    class="fab fa-youtube"></i></a>
                                                        </li>
                                                    @endif

                                                    @if (!empty($user_social_links->twitter))
                                                        <li class="social-icons-twitter mx-2"><a
                                                                href="{{ $user_social_links->twitter }}" target="_blank"
                                                                title="Twitter"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                    @endif

                                                    @if (!empty($user_social_links->instagram))
                                                        <li class="social-icons-instagram"><a
                                                                href="{{ $user_social_links->instagram }}" target="_blank"
                                                                title="Instagram"><i class="fab fa-instagram"></i></a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation"
                            class="owl-prev disabled"></button><button type="button" role="presentation"
                            class="owl-next"></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>
</section>
