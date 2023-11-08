import "./bootstrap";

// Handle dark mode
const darkModeToggle = document.getElementById("darkModeToggle");
const darkModeIndicator = document.getElementById("darkModeIndicator");
const darkModeEnabled = localStorage.getItem("darkMode") === "true";

if (darkModeEnabled) {
    document.body.classList.add("dark");
    darkModeIndicator.style.transform = "translateX(100%)";
}

darkModeToggle.addEventListener("change", () => {
    if (darkModeToggle.checked) {
        document.body.classList.add("dark");
        localStorage.setItem("darkMode", "true");
        darkModeIndicator.style.transform = "translateX(100%)";
    } else {
        document.body.classList.remove("dark");
        localStorage.setItem("darkMode", "false");
        darkModeIndicator.style.transform = "translateX(0%)";
    }
});

// Set user location
(async () => {
    // Check for geolocation and set user's location
    if ("geolocation" in navigator) {
        // Check if the user location is set

        const position = await new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(resolve, reject);
        });

        const { latitude: userLatitude, longitude: userLongitude } =
            position.coords;

        const CSRF_TOKEN = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        fetch("/set-user-location", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
            body: JSON.stringify({
                userLatitude,
                userLongitude,
            }),
        });
    }
})();
