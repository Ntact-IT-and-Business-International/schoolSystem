@extends('template')

@section('content')

    @livewire('midterm-primary-marksheet',['class_id'=>$class_id,'term'=>$term])

@endsection