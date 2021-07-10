@foreach ($langs as $language)
    <div class="col-6">
        <a href="{{ $language->url }}">
            <img src="{{ $language->flag }}" width="20%"> {{ strtoupper( $language->code ) }} ({{ $language->name }})
        </a>
    </div>
@endforeach
