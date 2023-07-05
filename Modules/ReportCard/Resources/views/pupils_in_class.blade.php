@extends('template')

@section('content')

    @livewire('termly-class-students',['class_id'=>$class_id])

@endsection