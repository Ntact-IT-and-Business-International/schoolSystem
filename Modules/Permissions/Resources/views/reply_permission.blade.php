@extends('template')

@section('content')

    @livewire('reply-permission-request',['permission_id'=>$permission_id])

@endsection