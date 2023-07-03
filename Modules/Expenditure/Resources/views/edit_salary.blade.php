@extends('template')

@section('content')

    @livewire('edit-salary',['salary_id'=>$salary_id])

@endsection