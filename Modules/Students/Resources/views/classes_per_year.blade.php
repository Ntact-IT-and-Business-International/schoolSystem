@extends('template')

@section('content')

    @livewire('classess-per-year',['year_id'=>$year_id])

@endsection