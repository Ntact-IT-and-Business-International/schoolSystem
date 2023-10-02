@extends('template')

@section('content')

    @livewire('edit-library',['library_id'=>$library_id])

@endsection