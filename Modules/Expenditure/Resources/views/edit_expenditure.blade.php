@extends('template')

@section('content')

    @livewire('edit-expenditure',['expenditure_id'=>$expenditure_id])

@endsection