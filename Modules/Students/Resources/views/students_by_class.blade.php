@extends('template')

@section('content')

    @livewire('students',['class_id'=>$class_id]) 

@endsection