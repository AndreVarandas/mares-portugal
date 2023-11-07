@extends('layout')

@section('content')
    <main class="container mx-auto py-8 space-y-12 flex flex-col justify-center h-full">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">🌊 Tides @ Portugal</h1>
            <select class="mt-4 border border-gray-300 rounded-md shadow-sm p-2" id="portDropdown">
                @foreach ($portNames as $port)
                    <option value="{{ $port }}" @if ($port === $requestedPort) selected @endif>
                        {{ $port }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-6">
            @foreach ($preferedPort as $port)
                <div
                    class="border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 cursor-pointer">
                    <h3 class="text-lg font-bold text-gray-800">{{ $port['port'] }}</h3>
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-600">
                        <p>{{ $port['desc_en'] }} - {{ $port['height'] }}</p>
                        <p class="font-semibold">{{ $port['hour'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <script>
        // Function to handle dropdown change and redirect
        const handlePortChange = (event) => {
            const selectedPort = event.target.value;
            window.location.href = `?port=${selectedPort}`;
        };

        // Event listener for dropdown change
        const portDropdown = document.getElementById('portDropdown');
        if (portDropdown) {
            portDropdown.addEventListener('change', handlePortChange);
        }
    </script>
@endsection
