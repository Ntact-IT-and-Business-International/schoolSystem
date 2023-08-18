@extends('template')

@section('content')

    @livewire('nursery-exam-marksheet',['class_id' =>$class_id,'term'=>$term])

@endsection