@extends('template')

@section('content')

    @livewire('primary-marksheet',['class_id'=>$class_id,'term'=>$term])

@endsection