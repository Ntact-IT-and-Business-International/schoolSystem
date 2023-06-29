@extends('template')

@section('content')

    @livewire('forward-permission-request',['permission_id'=>$permission_id])

@endsection