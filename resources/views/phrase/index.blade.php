@extends('layouts.app')

@section('content')
    @include('partial.page-header', ['name' => 'Phrases'])
    @livewire('phrase')
@endsection

