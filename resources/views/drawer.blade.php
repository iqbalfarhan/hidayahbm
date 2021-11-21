@extends('layouts.argon')
@section('content')
{{-- @dump($data) --}}
	@livewire($page, ['data' => isset($data) ? $data : null])
@endsection