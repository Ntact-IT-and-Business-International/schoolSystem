@extends('template')

@section('content')

    @livewire('students-for-classess-per-year',['class_id'=>$class_id]) 

@endsection