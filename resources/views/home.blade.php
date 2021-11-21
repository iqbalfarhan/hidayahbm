@extends('layouts.argon')

@section('content')
@livewire('dashboard.'.auth()->user()->akses)
@endsection
