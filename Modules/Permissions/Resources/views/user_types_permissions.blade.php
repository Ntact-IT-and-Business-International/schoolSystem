@extends('template')

@section('content')

    @livewire('all-user-type-permissions',['permission_id'=>$permission_id])

@endsection