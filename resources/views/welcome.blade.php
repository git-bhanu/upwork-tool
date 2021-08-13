@extends('layouts.app')

@section('content')
    <div class="w-full mt-8">
        <h1 class="text-4xl font-bold subpixel-antialiased text-center text-blue-500 mt-8 pt-6">Project Qualification</h1>
        <div class="flex justify-center my-1">
            @livewire('main.analyze-description')
        </div>
    </div>
@endsection
