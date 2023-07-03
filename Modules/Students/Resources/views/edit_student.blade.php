@extends('template')

@section('content')

    @livewire('edit-student',['student_id'=>$student_id])

@endsection