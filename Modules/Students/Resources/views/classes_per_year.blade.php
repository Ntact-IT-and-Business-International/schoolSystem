@extends('template')

@section('content')

    @livewire('classess-per-year',['class_id'=>$class_id])

@endsection