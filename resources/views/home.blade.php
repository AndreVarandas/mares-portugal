@extends('layout')

@section('content')
    <main class="container mx-auto py-8 space-y-6 flex flex-col justify-center h-full">
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
        <div class="overflow-x-auto rounded-lg border dark:bg-gray-800 dark:border-gray-500">
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

    @vite('resources/js/home.js')
@endsection
