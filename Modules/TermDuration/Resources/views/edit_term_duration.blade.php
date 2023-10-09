@extends('template')

@section('content')

    @livewire('edit-term-duration',['term_duration_id'=>$term_duration_id])
    

@endsection