@extends('template')

@section('content')

    @livewire('termly-classes',['term_id'=>$term_id])

@endsection