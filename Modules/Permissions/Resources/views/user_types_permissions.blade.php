@extends('template')

@section('content')

    @livewire('all-user-type-permissions',['category_id'=>$category_id])

@endsection