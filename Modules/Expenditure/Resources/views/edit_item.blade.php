@extends('template')

@section('content')

    @livewire('edit-items',['scholastic_id'=>$scholastic_id])

@endsection