@extends('template')

@section('content')

    @livewire('clear-fees-form',['payment_id'=>$payment_id])

@endsection