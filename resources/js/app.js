import "./bootstrap";

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
