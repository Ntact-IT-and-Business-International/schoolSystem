@extends('template')

@section('content')

    @livewire('morestaff-information',['staff_id'=>$staff_id])

@endsection