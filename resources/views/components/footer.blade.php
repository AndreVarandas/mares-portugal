<footer class="container mx-auto max-w-4xl px-4 py-8 text-gray-600">
    <div class="flex flex-col items-center space-y-2">
        <p class="text-center flex items-center space-x-1 text-xs">
            <span>© {{ date('Y') }} por</span>
            <a href="https://github.com/andrevarandas" target="_blank" rel="noopener noreferrer"
                class="font-semibold underline hover:text-gray-800">André Varandas</a>
            <span>&amp;</span>
            <a href="https://github.com/andrebravoferreira" target="_blank" rel="noopener noreferrer"
                class="font-semibold underline hover:text-gray-800">André Bravo Ferreira</a>
        </p>
        <p class="text-center text-xs">
            Version {{ config('app.version') }}
        </p>
    </div>
</footer>