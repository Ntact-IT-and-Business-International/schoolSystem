@extends('template')

@section('content')

    @livewire('student-report-card',['student_id' =>$student_id])

@endsection