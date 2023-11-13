<!-- Navigation menu -->
<header class="bg-gray-100 dark:bg-gray-800 shadow">
    <nav class="container mx-auto px-6 md:px-0 py-4 flex justify-between items-center relative">
        <!-- Logo -->
        <div class="hidden md:block">
            <a href="#" class="text-xl font-bold text-gray-800 dark:text-white">
                <img src="{{ asset('icons/tide.svg') }}" alt="Mares de Portugal" class="h-8">
            </a>
        </div>

        <!-- Hamburger icon for mobile -->
        <div class="block md:hidden">
            <button id="hamburger" class="flex items-center text-gray-800 dark:text-white focus:outline-none"
                onclick="toggleMenu()">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Menu items -->
        <ul id="menu"
            class="hidden md:flex flex-col md:flex-row md:space-x-4 md:text-gray-600 dark:text-gray-300 absolute top-full left-0 right-0 w-full bg-white dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
            <li><a href="/" class="hover:text-gray-900 dark:hover:text-white px-4 py-2 block">Tides</a></li>
            <li><a href="/moons" class="hover:text-gray-900 dark:hover:text-white px-4 py-2 block">Moons</a></li>
        </ul>

        <!-- Dark mode toggle -->
        <div class="flex items-center space-x-4">
            <input type="checkbox" id="darkModeToggle" class="hidden" aria-checked="false" role="switch">
            <label for="darkModeToggle"
                class="bg-gray-300 dark:bg-gray-700 w-12 h-6 rounded-full flex items-center p-1 cursor-pointer">
                <div class="w-5 h-5 bg-gray-600 dark:bg-blue-300 rounded-full" id="darkModeIndicator"></div>
            </label>
        </div>
    </nav>
</header>

<script>
    function toggleMenu() {
        const menu = document.getElementById("menu");
        const hamburger = document.getElementById("hamburger");

        menu.classList.toggle("hidden");
        menu.classList.toggle("slide-down");
        hamburger.innerHTML = menu.classList.contains("hidden") ? getHamburgerIcon() : getCloseIcon();
    }

    function getHamburgerIcon() {
        return `<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>`;
    }

    function getCloseIcon() {
        return `<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>
            </svg>`;
    }
</script>

<style>
    .slide-down {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
