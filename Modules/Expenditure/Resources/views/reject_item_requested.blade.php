@extends('template')

@section('content')

    @livewire('reject-requested-item',['request_id'=>$request_id])

@endsection