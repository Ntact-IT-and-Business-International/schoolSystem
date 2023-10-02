@extends('template')

@section('content')

    @livewire('edit-school-fees',['fee_id'=>$fee_id])

@endsection