@extends('template')

@section('content')

    @livewire('student-midterm-results',['student_id' =>$student_id,'term'=>$term])

@endsection