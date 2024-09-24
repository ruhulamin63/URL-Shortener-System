<div>
    @extends('layouts.app')

    @section('content')
        <p>Original URL: <a href="{{ $url->original_url }}">{{ $url->original_url }}</a></p>
        <p>Short URL: <a href="{{ url($url->short_url) }}">{{ url($url->short_url) }}</a></p>
    @endsection
</div>
