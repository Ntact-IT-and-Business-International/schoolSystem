@extends('template')

@section('content')

    @livewire('view-more-students-details',['student_id'=>$student_id]) 

@endsection