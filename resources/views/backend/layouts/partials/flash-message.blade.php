
@if (Session::has('success'))
    <script>
        toastr.success( "{!! Session::get('success') !!}", 'Success', 
            { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 2000 }
        );
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error( "{!! Session::get('error') !!}", 'Error', 
            { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 }
        );
    </script>
@endif

