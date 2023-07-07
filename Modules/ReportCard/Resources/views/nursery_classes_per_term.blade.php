@extends('template')

@section('content')

    @livewire('nursery-termly-classes',['term_id'=>$term_id])

@endsection