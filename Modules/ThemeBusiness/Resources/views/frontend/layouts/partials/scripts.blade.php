<!-- Head Libs -->
<script src="{{ asset('public/modules/theme-business/js/vendor/modernizr.min.js')}}"></script>

<!-- Vendor -->
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.appear.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.easing.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.cookie.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/jquery.validate.min.js')}}"></script> --}}
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/jquery.easypiechart.min.js')}}"></script> --}}
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/jquery.gmap.min.js')}}"></script> --}}
<script src="{{ asset('public/modules/theme-business/js/vendor/lazysizes.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.isotope.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{ asset('public/modules/theme-business/js/vendor/jquery.magnific-popup.min.js')}}"></script>
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/jquery.vide.min.js')}}"></script> --}}
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/vivus.min.js')}}"></script> --}}

{{-- Parsley Validation JS --}}
<script src="{{ asset('public/assets/common/vendor/parsley/parsley.min.js')}}"></script>

{{-- Axios JS --}}
{{-- <script src="{{ asset('public/assets/common/vendor/axios/axios.min.js')}}"></script> --}}

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('public/modules/theme-business/js/vendor/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/view.contact.js')}}"></script> --}}


<!-- Demo -->
{{-- <script src="{{ asset('public/modules/theme-business/js/vendor/demo-cleaning-services.js')}}"></script> --}}

<!-- Theme Initialization Files -->
<script src="{{ asset('public/modules/theme-business/js/vendor/theme.init.js')}}"></script>

<script defer="" src="{{ asset('public/modules/theme-business/js/vendor/beacon.min.js')}}" data-cf-beacon="{&quot;rayId&quot;:&quot;66c7b7818837d9d4&quot;,&quot;version&quot;:&quot;2021.6.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;03fa3b9eb60b49789931c4694c153f9b&quot;,&quot;si&quot;:10}"></script>

<!-- Noty JS -->
<script src="{{ asset('public/assets/common/vendor/noty/noty.min.js') }}"></script>

<script>
    document.body.style.margin = "0px";
</script>

@include('frontend.layouts.partials.flash-messages')

{{-- Any Custom script include in the `scripts` blade section --}}
@yield('scripts')
