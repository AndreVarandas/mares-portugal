@extends('layout')

@section('content')

    @if (isset($error))
        <p>Error: {{ $error }}</p>
    @else
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($closestPortData as $port)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold">{{ $port['port'] }}</h3>
                        <img src="{{ asset('icons/tide.svg') }}" alt="Tide Icon" class="h-8 w-8 sm:h-10 sm:w-10">
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-700 text-base sm:text-lg">
                            {{ $port['desc_en'] }} - {{ $port['height'] }}
                        </p>
                        <p class="text-gray-700 text-base sm:text-lg">
                            {{ $port['hour'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


    @vite('resources/js/app.js')
@endsection
