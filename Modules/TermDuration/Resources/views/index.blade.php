@extends('termduration::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('termduration.name') !!}
    </p>
@endsection
