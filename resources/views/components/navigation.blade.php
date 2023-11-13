<!-- Navigation menu -->
<header class="bg-gray-100 dark:bg-gray-800 shadow">
    <nav class="container mx-auto px-6 md:px-0 py-4 flex items-center">
        <!-- Logo -->
        <a href="/" class="text-xl font-bold text-gray-800 dark:text-white">
            <img src="{{ asset('icons/tide.svg') }}" alt="Mares de Portugal" class="h-8">
        </a>
        <!-- Menu items -->
        <ul id="menu" class="flex flex-row md:space-x-4 md:text-gray-600 dark:text-gray-300">
            <li>
                <a href="{{ route('tides') }}"
                    class="hover:text-gray-900 hover:underline dark:hover:text-white ml-2 md:ml-8 px-2 py-2 block
                    {{ request()->routeIs('home') ? 'font-bold' : '' }}">
                    Tides
                </a>
            </li>
            <li>
                <a href="{{ route('moons') }}"
                    class="hover:text-gray-900 hover:underline dark:hover:text-white px-2 py-2 block
                    {{ request()->routeIs('moons') ? 'font-bold' : '' }}">
                    Moons
                </a>
            </li>
        </ul>
        <!-- Dark mode toggle, at the end of the nav -->
        <div class="flex items-center space-x-4 ml-auto">
            <input type="checkbox" id="darkModeToggle" class="hidden" aria-checked="false" role="switch">
            <label for="darkModeToggle"
                class="bg-gray-300 dark:bg-gray-700 w-12 h-6 rounded-full flex items-center p-1 cursor-pointer">
                <div class="w-5 h-5 bg-gray-600 dark:bg-blue-300 rounded-full" id="darkModeIndicator"></div>
            </label>
        </div>
    </nav>
</header>

<script>
    // Handle dark mode
    const darkModeToggle = document.getElementById("darkModeToggle");
    const darkModeIndicator = document.getElementById("darkModeIndicator");
    const darkModeEnabled = localStorage.getItem("darkMode") === "true";

    if (darkModeEnabled) {
        document.body.classList.add("dark");
        darkModeIndicator.style.transform = "translateX(100%)";
    }

    function onDarkModeToggle() {
        if (darkModeToggle.checked) {
            document.body.classList.add("dark");
            localStorage.setItem("darkMode", "true");
            darkModeIndicator.style.transform = "translateX(100%)";
        } else {
            document.body.classList.remove("dark");
            localStorage.setItem("darkMode", "false");
            darkModeIndicator.style.transform = "translateX(0%)";
        }
    }

    darkModeToggle.addEventListener("change", onDarkModeToggle);
</script>
