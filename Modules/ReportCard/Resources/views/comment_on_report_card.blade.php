@extends('template')

@section('content')

    @livewire('report-card-comments',['student_id'=>$student_id,'term'=>$term])

@endsection