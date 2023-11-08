@extends('layout')

@section('content')
    <main class="container mx-auto py-8 space-y-12 flex flex-col justify-center h-full">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">🌊 Tides @ Portugal</h1>
            <select class="mt-4 border border-gray-300 rounded-md shadow-sm p-2" id="portDropdown">
                @foreach ($portNames as $port)
                    <option value="{{ $port }}" @if ($port === $preferedPort[0]['port']) selected @endif>
                        {{ $port }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Port
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description & Height</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hour
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($preferedPort as $port)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap font-bold">
                                {{ $port['port'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-semibold">{{ $port['desc_en'] }}</span> {{ $port['height'] }} Meters
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $port['hour'] }}</td>
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
        const portDropdown = document.getElementById('portDropdown');
        if (portDropdown) {
            portDropdown.addEventListener('change', handlePortChange);
        }
    </script>
@endsection
