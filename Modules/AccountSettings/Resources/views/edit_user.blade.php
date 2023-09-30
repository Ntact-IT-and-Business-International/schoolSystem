@extends('template')

@section('content')

    @livewire('edit-user',['user_id'=>$user_id])

@endsection