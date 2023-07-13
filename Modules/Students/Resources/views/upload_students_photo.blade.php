@extends('template')

@section('content')

    @livewire('upload-student-photo',['student_id'=>$student_id]) 

@endsection