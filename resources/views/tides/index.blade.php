@extends('layout')

@section('content')
    <main class="container mx-auto py-8 flex flex-col justify-center h-full ">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">🌊 Tides @ Portugal</h1>
            <select class="mt-6 border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-700 dark:text-white"
                id="portDropdown">
                @foreach ($portNames as $port)
                    <option value="{{ $port }}" @if ($port === $selectedPort[0]['port']) selected @endif>
                        {{ $port }}
                    </option>
                @endforeach
            </select>
        </div>
        @if ($currentTide)
            <div class="bg-blue-300 md:rounded-lg md:rounded-b-none p-4 md:p-6 flex space-x-4 items-center md:flex-col">
                <img src={{ asset('icons/tide.svg') }} alt="tide" class="w-12 h-12 md:w-24 md:h-24" />
                <h2 class="text-2xl sm:text-3xl font-bold
                    text-gray-800 md:mb-4">
                    {{ $currentTide['desc_en'] }}</h2>
            </div>
        @endif
        <div class="overflow-x-auto md:rounded-lg md:rounded-t-none border dark:bg-gray-800 dark:border-gray-500">
            <table class="min-w-full divide-y divide-gray-200 dark:text-white dark:divide-gray-500">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-4 sm:px-2 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Port</th>
                        <th
                            class="px-4 sm:px-2 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Description & Height</th>
                        <th
                            class="px-4 sm:px-2 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Hour</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-500">
                    @foreach ($selectedPort as $port)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap font-bold">{{ $port['port'] }}</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold">{{ $port['desc_en'] }}</span> {{ $port['height'] }} Meters
                            </td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap font-semibold">{{ $port['hour'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        // Function to handle dropdown change and redirect
        const handlePortChange = (event) => {
            const selectedPort = event.target.value;
            window.location.href = `?port=${selectedPort}`;
        };

        // Event listener for dropdown change
        const portDropdown = document.getElementById("portDropdown");
        if (portDropdown) {
            portDropdown.addEventListener("change", handlePortChange);
        }
    </script>
@endsection
