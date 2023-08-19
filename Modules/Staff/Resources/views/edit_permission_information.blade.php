@extends('template')

@section('content')

    @livewire('edit-pupils-permission',['permission_id'=>$permission_id])

@endsection