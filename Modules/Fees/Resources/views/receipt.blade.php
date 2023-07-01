@extends('template')

@section('content')

    @livewire('fees-payment-receipt',['receipt_id' =>$receipt_id])

@endsection