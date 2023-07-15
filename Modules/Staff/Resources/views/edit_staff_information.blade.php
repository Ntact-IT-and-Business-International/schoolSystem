@extends('template')

@section('content')

    @livewire('edit-staff',['staff_id'=>$staff_id])

@endsection