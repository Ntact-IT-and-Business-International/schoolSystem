@extends('template')

@section('content')

    @livewire('edit-class',['class_id'=>$class_id])

@endsection