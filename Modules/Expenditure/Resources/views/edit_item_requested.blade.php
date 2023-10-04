@extends('template')

@section('content')

    @livewire('edit-requested-items',['request_id'=>$request_id])

@endsection