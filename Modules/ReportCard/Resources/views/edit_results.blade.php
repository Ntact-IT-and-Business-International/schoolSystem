@extends('template')

@section('content')

    @livewire('edit-examination-results',['result_id'=>$result_id])

@endsection