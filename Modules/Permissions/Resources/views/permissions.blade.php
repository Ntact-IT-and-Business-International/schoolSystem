@extends('template')

@section('content')

    @livewire('permission',['user_type_id'=>$user_type_id])

@endsection