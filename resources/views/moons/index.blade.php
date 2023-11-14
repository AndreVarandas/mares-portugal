@extends('layout')

@section('content')
    <main class="container mx-auto py-8 flex flex-col justify-center md:h-full">
        <h1 class="text-center text-4xl font-bold text-gray-800 dark:text-white">🌗 Moons @ Portugal</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 md:gap-6 mt-8">
            @foreach ($moonData as $moon)
                <div class="bg-white flex items-center dark:bg-gray-800 shadow-md md:rounded-md p-6">
                    <figure class="mb-2 text-6xl">
                        {{ $moon['emoji'] }}
                    </figure>
                    <div class="flex flex-col space-y-2 ml-4">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $moon['desc_en'] }}
                        </h2>
                        <p class="text-gray-600 font-thin dark:text-gray-400">{{ $moon['day'] }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </main>
@endsection
