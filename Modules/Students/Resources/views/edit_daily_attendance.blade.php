@extends('template')

@section('content')

    @livewire('edit-daily-attendance',['attendance_id'=>$attendance_id])

@endsection