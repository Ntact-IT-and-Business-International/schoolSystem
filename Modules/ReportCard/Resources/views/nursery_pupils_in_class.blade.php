@extends('template')

@section('content')

    @livewire('nursery-termly-class-students',['class_id'=>$class_id])

@endsection