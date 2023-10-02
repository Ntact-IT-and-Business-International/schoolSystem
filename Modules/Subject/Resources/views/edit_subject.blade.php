@extends('template')

@section('content')

    @livewire('edit-subject',['subject_id'=>$subject_id])

@endsection