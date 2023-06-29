@extends('template')

@section('content')

    @livewire('reply-complain',['complain_id'=>$complain_id])

@endsection