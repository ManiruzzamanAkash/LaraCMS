@if (Session::has('success'))
<script>
    new Noty({
        theme  : 'sunset',
        type   : 'success',
        text   : "<h2>Success</h2>{!! Session::get('success') !!}",
        layout : 'topCenter',
        timeout: 5000
    }).show();
</script>
@endif

@if (Session::has('error'))
<script>
    new Noty({
        theme  : 'sunset',
        type   : 'error',
        text   : "<h2>Error</h2>{!! Session::get('error') !!}",
        layout : 'bottomCenter',
        timeout: 5000
    }).show();
</script>
@endif

