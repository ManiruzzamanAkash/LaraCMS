@php $services = \Modules\Service\Entities\Service::get(); @endphp
<div class="row appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
    <div class="col">
        <div class="owl-carousel nav-outside nav-arrows-1 custom-carousel-box-shadow-1 appear-animation owl-theme owl-carousel-init fadeInUpShorter appear-animation-visible owl-loaded owl-drag" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{&#39;responsive&#39;: {&#39;0&#39;: {&#39;items&#39;: 1}, &#39;479&#39;: {&#39;items&#39;: 1}, &#39;768&#39;: {&#39;items&#39;: 2}, &#39;979&#39;: {&#39;items&#39;: 3}, &#39;1199&#39;: {&#39;items&#39;: 3}}, &#39;autoplay&#39;: false, &#39;autoplayTimeout&#39;: 5000, &#39;autoplayHoverPause&#39;: true, &#39;dots&#39;: false, &#39;nav&#39;: true, &#39;loop&#39;: false, &#39;margin&#39;: 20, &#39;stagePadding&#39;: &#39;75&#39;}" style="height: auto; animation-delay: 750ms;">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1595px;">
                    @foreach ($services as $service)
                        <div class="owl-item" style="width: 378.667px; margin-right: 20px;">
                            <div>
                                <a href="{{ route('demo.business.service.show', $service->slug) }}" class="text-decoration-none">
                                    <div class="card custom-card-style-1">
                                        <div class="card-body text-center py-5">
                                            <div class="custom-card-style-1-image-wrapper bg-primary d-inline-block mb-3">
                                                <img src="{{ asset('public/images/services/' . $service->image) }}" class="img-fluid" alt="">
                                            </div>
                                            <h4 class="custom-card-style-1-title text-color-secondary font-weight-bold mb-2">
                                                {{ $service->title }}
                                            </h4>
                                            <p class="custom-card-style-1-description">
                                                {{ substr( strip_tags($service->description), 0, 160) }}...
                                            </p>
                                            <span class="custom-card-style-1-link font-weight-bold">VIEW MORE</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"></button><button type="button" role="presentation" class="owl-next"></button></div>
            <div class="owl-dots disabled"></div>
        </div>
    </div>
</div>
