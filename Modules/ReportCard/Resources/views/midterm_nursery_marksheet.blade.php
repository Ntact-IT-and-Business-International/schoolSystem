@extends('template')

@section('content')

    @livewire('nursery-midterm-marksheet',['class_id' =>$class_id,'term'=>$term])

@endsection